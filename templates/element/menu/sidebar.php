<?php 
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');
?>
<!-- Side Menu -->
<nav id="sidebar" class="shadow p-4" style="background: linear-gradient(135deg,rgb(0, 0, 0),rgb(78, 78, 78));">
    <div class="sidebar-header pt-3 ps-3">
        <div class="d-flex align-items-center">
            <b class="logo-small d-inline-block"><i class="fa-solid fa-fire-flame-curved"></i> STOVE</b>
        </div>
        <style>
            @keyframes flicker {
                0% {
                    text-shadow: 0 0 5px rgb(141, 137, 136), 0 0 15px rgb(0, 0, 0), 0 0 20px #ff4500, 0 0 25px #ff6347;
                }
                50% {
                    text-shadow: 0 0 5px #ff6347, 0 0 15px #ff4500, 0 0 25px #ff6347, 0 0 25px #ff4500;
                }
                100% {
                    text-shadow: 0 0 5px rgb(141, 137, 136), 0 0 10px rgb(0, 0, 0), 0 0 20px #ff4500, 0 0 25px #ff6347;
                }
            }
            .logo-small {
                font-size: 32px;
                color: #ff4500;
                animation: flicker 2s infinite;
            }
            .logo-small i {
                margin-right: 8px;
                color: #000000;
                animation: flicker 2s infinite;
            }

            #sidebar .menu-link {
                color: #ffffff !important;
                text-decoration: none;
                padding: 8px 12px;
                display: block;
                transition: background 0.3s ease;
            }
            #sidebar .menu-link:hover, #sidebar .menu-item.active .menu-link {
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 8px;
            }

            #sidebar .menu-item {
                margin-bottom: 12px;
            }
            .dsline {
                height: 2px;
                width: 100%;
                background: linear-gradient(90deg, rgba(255, 0, 0, 0.2) 0%, red 50%, rgba(255, 0, 0, 0.2) 100%);
                animation: glowing-line 2s linear infinite;
                border-radius: 2px;
            }
            @keyframes glowing-line {
                0% {
                    background-position: 0% 0%;
                }
                100% {
                    background-position: 200% 0%;
                }
            }
        </style>
    </div>

    <div class="px-0">
        <ul class="list-unstyled components">
            <?php if ($this->Identity->isLoggedIn() == NULL) { ?>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-arrow-right"></i> Sign-in'), ['controller' => 'Users', 'action' => 'login', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
            <?php } ?>
            <?php if ($this->Identity->isLoggedIn()) { ?>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-code"></i> Dashboard'), ['controller' => 'Dashboards', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
            <?php } ?>

            <li class="menu-item">
                <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-circle-question"></i> FAQ'), ['controller' => 'Faqs', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
            </li>
            <li class="menu-item">
                <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-message"></i> Contact Us'), ['controller' => 'Contact', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
            </li>

            <?php if ($this->Identity->isLoggedIn()) { ?>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-kitchen-set"></i> Recipe'), ['controller' => 'Recipes', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <li class="menu-item <?= $c_name == 'Users' && $a_name == 'profile' ? 'active' : '' ?>">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-user-tie"></i> Profile'), ['controller' => 'Users', 'action' => 'profile', 'prefix' => false, $this->Identity->get('slug')], ['class' => 'menu-link', 'escape' => false]) ?>
                </li>
                <li class="menu-item">
                    <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-arrow-right-from-bracket"></i> Logout'), ['controller' => 'Users', 'action' => 'logout', 'prefix' => false], ['class' => 'menu-link', 'escape' => false, 'alt' => 'Sign-out']) ?>
                </li>
                <?php if ($this->Identity->get('user_group_id') == '1') { ?>
                    <!-- Administrator -->
                    <li class="menu-header fw-bold text-uppercase mt-4 mb-3">
                        <span class="menu-header-text ps-4">Administrator</span>
                        <div class="dsline mb-3"></div>
                    </li>
                    <li class="menu-item">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-list-ul"></i> Category'), ['controller' => 'Categories', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-kitchen-set"></i> Recipe'), ['controller' => 'Recipes', 'action' => 'index', 'prefix' => false], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Settings' && $a_name == 'update' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-gear"></i> Site Configuration'), ['prefix' => 'Admin', 'controller' => 'Settings', 'action' => 'update', 'recrud'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Users' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-users-viewfinder"></i> User Management'), ['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Todos' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-list-check"></i> To-do'), ['prefix' => 'Admin', 'controller' => 'Todos', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Contacts' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-message"></i> Contacts'), ['prefix' => 'Admin', 'controller' => 'Contacts', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'AuditLogs' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-solid fa-timeline"></i> Audit Trail'), ['prefix' => 'Admin', 'controller' => 'auditLogs', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                    <li class="menu-item <?= $c_name == 'Faqs' && $a_name == 'index' ? 'active' : '' ?>">
                        <?= $this->Html->link(__('<i class="menu-icon fa-regular fa-circle-question"></i> FAQ'), ['prefix' => 'Admin', 'controller' => 'Faqs', 'action' => 'index'], ['class' => 'menu-link', 'escape' => false]) ?>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</nav>
