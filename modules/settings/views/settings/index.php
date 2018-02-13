<?php
use yii\helpers\Url;
?>


<div class="row">
    <div class="col-md-8 ml-auto mr-auto">

        <div class="alert alert-info">
            <span>This is a plain notification</span>
        </div>
        <h4 class="card-title text-center">Settings</h4>
        <br />
        <div class="nav-container">
            <ul class="nav nav-icons justify-content-center" role="tablist">
                <li class="nav-item show active">
                    <a class="nav-link" id="description-tab" href="#description-logo" role="tab" data-toggle="tab">
                        <i class="nc-icon nc-delivery-fast"></i>
                        <br> Transactions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="location-tab" href="#map-logo" role="tab" data-toggle="tab">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <br> Leads
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="legal-info-tab" href="#legal-logo" role="tab" data-toggle="tab">
                        <i class="nc-icon nc-bank"></i>
                        <br> Banking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="help-tab" href="#help-logo" role="tab" data-toggle="tab">
                        <i class="nc-icon nc-support-17"></i>
                        <br> Help Center
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="description-logo" aria-labelledby="info-tab">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">
                            <a class="btn btn-wd btn-info btn-outline" href="<?=

                            Url::to(['/payout/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-credit-card"></i>
                                                    </span>
                                Payment
                            </a> <a class="btn btn-wd btn-info btn-outline" href="<?=

                            Url::to(['/payout/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-money"></i>
                                                    </span>
                                Payout
                            </a> </h4>
                        <p class="card-category text-center">TYPES</p>
                    </div>
                    <div class="card-body text-center">
                        <p>Here you can create new types of payments or payouts.</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="map-logo" aria-labelledby="info-tab">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title text-center">
                            <a class="btn btn-wd btn-info btn-outline" href="<?= Url::to(['/wallet/bank/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-address-card-o"></i>
                                                    </span>
                                Form
                            </a>
                            <a class="btn btn-wd btn-info btn-outline" href="<?= Url::to(['/wallet/currency/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-area-chart"></i>
                                                    </span>
                                Landing
                            </a>
                            <a class="btn btn-wd btn-info btn-outline" href="<?= Url::to(['/wallet/currency/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </span>
                                Channel
                            </a>
                        </h4>
                        <p class="card-category text-center">INFORMATION</p>
                    </div>
                    <div class="card-body text-center">
                        <p>These settings only for SEO | SMM.</p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="legal-logo" aria-labelledby="info-tab">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">
                            <a class="btn btn-wd btn-info btn-outline" href="<?=

                            Url::to(['/wallet/bank/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-bank"></i>
                                                    </span>
                                Bank
                            </a> <a class="btn btn-wd btn-info btn-outline" href="<?=

                            Url::to(['/wallet/currency/index'])?>">
                                                    <span class="btn-label">
                                                        <i class="fa fa-dollar"></i>
                                                    </span>
                                Currency
                            </a>
                        </h4>
                        <p class="card-category text-center">TYPES</p>
                    </div>
                    <div class="card-body text-center">
                        <p>Here you can add a new bank | currency or delete them.</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="help-logo" aria-labelledby="info-tab">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Help center</h4>
                        <p class="card-category text-center">More information here</p>
                    </div>
                    <div class="card-body">
                        <p>From the seamless transition of glass and metal to the streamlined profile, every detail was carefully considered to enhance your experience. So while its display is larger, the phone feels just right.</p>
                        <p>Another Text. The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end tab card-body -->
    </div>
    <!-- end col-md-8 -->
</div>
