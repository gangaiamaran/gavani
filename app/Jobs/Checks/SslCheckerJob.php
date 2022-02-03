<?php

namespace App\Jobs\Checks;

use App\Models\Scans\SslCertificateScan;
use App\Models\Site;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\SslCertificate\SslCertificate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SslCheckerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Site $site;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(site $site)
    {
        $this->site = $site;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $certificate = SslCertificate::createForHostName($this->site->url, 30, false);

            SslCertificateScan::query()->create([
                'site_id' => $this->site->id,
                'issued_by' => $certificate->getIssuer(),
                'domain_name' => $certificate->getDomain(),
                'additional_domains' => json_encode($certificate->getAdditionalDomains()),
                'valid_from' => $certificate->validFromDate(),
                'valid_till' => $certificate->expirationDate(),
                'is_ssl_certificate_valid' => $certificate->isValid(),
                'is_ssl_certificate_expired' => $certificate->isExpired() ? true : false,
            ]);
        } catch (\Exception $exception) {
            $error = [
                'domain' => $this->site->url,
                'message' => $exception->getMessage(),
            ];
            logger()->error($exception->getMessage(), $error);
        }
    }
}
