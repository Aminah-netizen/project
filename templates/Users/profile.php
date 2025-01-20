<?php

use Cake\I18n\FrozenTime;

// Load CSS and JS resources
echo $this->Html->css('select2/css/select2.css');
echo $this->Html->script('select2/js/select2.full.min.js');
echo $this->Html->script('qr-code-styling-1-5-0.min.js');
?>

<!-- Header Section -->
<div class="container my-4">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="page_title mb-1"><?php echo $title; ?></h1>
            <h6 class="sub_title text-muted"><?php echo $system_name; ?></h6>
        </div>
    </div>
    <hr>
</div>

<!-- Main Content Section -->
<div class="container">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <!-- User Avatar -->
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <?php
                    $avatarPath = $user->avatar ? '../files/Users/avatar/' . $user->slug . '/' . $user->avatar : 'blank_profile.png';
                    echo $this->Html->image($avatarPath, ['class' => 'rounded-circle shadow mb-3', 'width' => '150px', 'height' => '150px']);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <!-- Navigation Tabs -->
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa-solid fa-user-astronaut"></i> Account', ['action' => 'profile', $user->slug], ['class' => 'nav-link active', 'escapeTitle' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa-regular fa-pen-to-square"></i> Update', ['action' => 'update', $user->slug], ['class' => 'nav-link', 'escapeTitle' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa-solid fa-unlock"></i> Password', ['action' => 'change_password', $user->slug], ['class' => 'nav-link', 'escapeTitle' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa-solid fa-timeline"></i> Activities', ['action' => 'activity', $user->slug], ['class' => 'nav-link', 'escapeTitle' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa-regular fa-file-pdf"></i> PDF', ['action' => 'profile_pdf', $user->slug], ['class' => 'nav-link', 'escapeTitle' => false]) ?>
                </li>
            </ul>

            <!-- Profile Details -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <td><?= h($user->fullname) ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                        <tr>
                            <th>Group</th>
                            <td><?= $user->user_group->name ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <?php
                                $statusLabels = [
                                    1 => '<span class="badge bg-success">Active</span>',
                                    0 => '<span class="badge bg-danger">Disabled</span>',
                                    'default' => '<span class="badge bg-secondary">Archived</span>'
                                ];
                                echo $statusLabels[$user->status] ?? $statusLabels['default'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Verified</th>
                            <td>
                                <?= $user->is_email_verified
                                    ? '<span class="badge bg-success">Verified</span>'
                                    : '<span class="badge bg-danger">Not verified</span>' ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Created on</th>
                            <td><?= date('M d, Y (h:i A)', strtotime($user->created)) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- QR Code Section -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">QR Code</h5>
                </div>
                <div class="card-body text-center">
                    <div id="qr"></div>
                    <script type="text/javascript">
                        const qrCode = new QRCodeStyling({
                            width: 150,
                            height: 150,
                            margin: 0,
                            data: "<?php echo $this->request->getUri(); ?>",
                            dotsOptions: {
                                type: "dots"
                            },
                            cornersSquareOptions: {
                                type: "dots",
                                color: "#007bff"
                            },
                            cornersDotOptions: {
                                type: "dots"
                            },
                            imageOptions: {
                                crossOrigin: "anonymous",
                                margin: 20
                            }
                        });

                        qrCode.append(document.getElementById("qr"));
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".input select").select2();
    });
</script>
