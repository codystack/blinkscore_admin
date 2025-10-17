        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar" id="sidebar">
            <div class="container-fluid">
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0" href="dashboard">
                    <img src="./assets/img/logo-dark.svg" width="200" alt="logo">
                </a>
                <div class="navbar-user d-lg-none">
                    <div class="dropdown">
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="avatar" src="<?= $avatar ?>" class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                            <a href="profile" class="dropdown-item">Profile</a>
                            <a href="security" class="dropdown-item">Security</a>
                            <hr class="dropdown-divider">
                            <a href="logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#sidebar-projects" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-projects"><i class="bi bi-briefcase"></i> Projects</a>
                            <div class="collapse" id="sidebar-projects">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="../projects/overview.html" class="nav-link">Overview</a></li>
                                    <li class="nav-item"><a href="../projects/grid-view.html" class="nav-link">Grid View</a></li>
                                    <li class="nav-item"><a href="../projects/table-view.html" class="nav-link">Table View</a></li>
                                    <li class="nav-item"><a href="../projects/details.html" class="nav-link">Details</a></li>
                                    <li class="nav-item"><a href="../projects/create-project.html" class="nav-link">Create Project</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#sidebar-tasks" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-tasks"><i class="bi bi-kanban"></i> Tasks</a>
                            <div class="collapse" id="sidebar-tasks">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="../tasks/overview.html" class="nav-link">Overview</a></li>
                                    <li class="nav-item"><a href="../tasks/list-view.html" class="nav-link">List View</a></li>
                                    <li class="nav-item"><a href="../tasks/list-view-aside.html" class="nav-link">List View w/ Details</a></li>
                                    <li class="nav-item"><a href="../tasks/board-view.html" class="nav-link">Board View</a></li>
                                    <li class="nav-item"><a href="../tasks/create-task.html" class="nav-link">Create Task</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#sidebar-files" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-files"><i class="bi bi-file-earmark-text"></i> Files</a>
                            <div class="collapse" id="sidebar-files">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="../files/overview.html" class="nav-link">Overview</a></li>
                                    <li class="nav-item"><a href="../files/table-view.html" class="nav-link">Table View</a></li>
                                    <li class="nav-item"><a href="../files/media-gallery.html" class="nav-link">Media Gallery</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#sidebar-integrations" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-integrations"><i class="bi bi-terminal"></i> Integrations</a>
                            <div class="collapse" id="sidebar-integrations">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="../integrations/applications.html" class="nav-link">Applications</a></li>
                                    <li class="nav-item"><a href="../integrations/manage-apps.html" class="nav-link">Manage Apps</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="#sidebar-user" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebar-user"><i class="bi bi-people"></i> User</a>
                            <div class="collapse show" id="sidebar-user">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="profile.html" class="nav-link">Profile</a></li>
                                    <li class="nav-item"><a href="table-view.html" class="nav-link font-bold">Table View</a></li>
                                    <li class="nav-item"><a href="permissions.html" class="nav-link">Permissions</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#sidebar-settings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-settings"><i class="bi bi-gear"></i> Settings</a>
                            <div class="collapse" id="sidebar-settings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="../settings/general.html" class="nav-link">General</a></li>
                                    <li class="nav-item"><a href="../settings/security.html" class="nav-link">Security</a></li>
                                    <li class="nav-item"><a href="../settings/team.html" class="nav-link">Team</a></li>
                                    <li class="nav-item"><a href="../settings/billing.html" class="nav-link">Billing</a></li>
                                    <li class="nav-item"><a href="../settings/notifications.html" class="nav-link">Notifications</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#sidebar-authentication" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebar-authentication"><i class="bi bi-person-bounding-box"></i> Authentication</a>
                            <div class="collapse"
                                id="sidebar-authentication">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item"><a href="../authentication/basic-login.html" class="nav-link">Basic Login</a></li>
                                    <li class="nav-item"><a href="../authentication/basic-register.html" class="nav-link">Basic Register</a></li>
                                    <li class="nav-item"><a href="../authentication/basic-recover.html" class="nav-link">Basic Recover</a></li>
                                    <li class="nav-item"><a href="../authentication/side-login.html" class="nav-link">Side Login</a></li>
                                    <li class="nav-item"><a href="../authentication/side-register.html" class="nav-link">Side Register</a></li>
                                    <li class="nav-item"><a href="../authentication/side-recover.html" class="nav-link">Side Recover</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <hr class="navbar-divider my-4 opacity-70">
                    <ul class="navbar-nav">
                        <li><span class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide">Resources</span></li>
                        <li class="nav-item"><a class="nav-link py-2" href="./assets/docs/index.html"><i class="bi bi-code-square"></i> Documentation</a></li>
                        <li class="nav-item"><a class="nav-link py-2 d-flex align-items-center" href="https://webpixels.io/themes/clever-admin-dashboard-template/releases" target="_blank"><i class="bi bi-journals"></i> <span>Changelog</span> <span class="badge badge-sm bg-soft-success text-success rounded-pill ms-auto">v1.0.0</span></a></li>
                    </ul>
                    <div class="mt-auto"></div>
                    <div class="my-4 px-lg-6 position-relative">
                        <div class="dropup w-full">
                            <button class="btn-primary d-flex w-full py-3 ps-3 pe-4 align-items-center shadow shadow-3-hover rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-3">
                                    <img alt="..." src="<?= $avatar ?>" class="avatar avatar-sm rounded-circle">
                                </span>
                                <span class="flex-fill text-start text-sm font-semibold"><?= $fullName ?></span>
                                <span><i class="bi bi-chevron-expand text-white text-opacity-70"></i></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end w-full">
                                <div class="dropdown-header">
                                    <span class="d-block text-sm text-muted mb-1">Signed in as</span>
                                    <span class="d-block text-heading font-semibold"><?= $fullName ?></span>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="profile"><i class="bi bi-person me-3"></i>Profile</a>
                                <a class="dropdown-item" href="security"><i class="bi bi-shield-check me-3"></i>Security</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout"><i class="bi bi-power me-3"></i>Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>