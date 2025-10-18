<?php
include "./components/header.php";

require_once('./config/db.php');

try {
    $stmt = $pdo->query("SELECT COUNT(*) AS total_users FROM users");
    $totalUsers = $stmt->fetch(PDO::FETCH_ASSOC)['total_users'];
} catch (Exception $e) {
    error_log("Error fetching user count: " . $e->getMessage());
    $totalUsers = 0;
}

?>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php include "./components/side-nav.php"; ?>

        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <?php include "./components/top-nav.php"; ?>

            <header>
                <div class="container-fluid">
                    <div class="pt-6">
                        <div class="row align-items-center">
                            <div class="col-sm col-12">
                                <h1 class="ls-tight"><span style="font-weight: 300">Hello,</span> <?= $firstName ?></h1>
                                <span class="eyebrow mb-1" id="greet"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Budget</span> <span class="h3 font-bold mb-0">$750.90</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle"><i class="bi bi-credit-card"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span class="badge badge-pill bg-soft-success text-success me-2"><i class="bi bi-arrow-up me-1"></i>30% </span><span class="text-nowrap text-xs text-muted">Since last month</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Users</span> 
                                            <span class="h3 font-bold mb-0"><?= number_format($totalUsers) ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape icon-lg bg-primary text-white text-2xl rounded-circle">
                                                <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Total hours</span> <span class="h3 font-bold mb-0">1.400</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i class="bi bi-clock-history"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span class="badge badge-pill bg-soft-danger text-danger me-2"><i class="bi bi-arrow-down me-1"></i>-10% </span><span class="text-nowrap text-xs text-muted">Since last month</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Work load</span> <span class="h3 font-bold mb-0">95%</span></div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle"><i class="bi bi-minecart-loaded"></i></div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm"><span class="badge badge-pill bg-soft-success text-success me-2"><i class="bi bi-arrow-up me-1"></i>15% </span><span class="text-nowrap text-xs text-muted">Since yestearday</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-6 mb-6">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h5 class="mb-0">Latest Applications</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Completion</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img alt="..." src="./assets/img/social/airbnb.svg" class="avatar avatar-sm rounded-circle me-2"> <a class="text-heading font-semibold" href="#">Website Redesign</a></td>
                                                <td>23-01-2022</td>
                                                <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In progress</span></td>
                                                <td>
                                                    <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-3.jpg"> </a>
                                                        <a
                                                            href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-4.jpg"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center"><span class="me-2">38%</span>
                                                        <div>
                                                            <div class="progress" style="width:100px">
                                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width:38%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><img alt="..." src="./assets/img/social/amazon.svg" class="avatar avatar-sm rounded-circle me-2"> <a class="text-heading font-semibold" href="#">E-commerce App</a></td>
                                                <td>23-01-2022</td>
                                                <td><span class="badge badge-lg badge-dot"><i class="bg-success"></i>Done</span></td>
                                                <td>
                                                    <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-3.jpg"> </a>
                                                        <a
                                                            href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-4.jpg"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center"><span class="me-2">83%</span>
                                                        <div>
                                                            <div class="progress" style="width:100px">
                                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" style="width:83%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><img alt="..." src="./assets/img/social/bootstrap.svg" class="avatar avatar-sm rounded-circle me-2"> <a class="text-heading font-semibold" href="#">Learning Platform</a></td>
                                                <td>23-01-2022</td>
                                                <td><span class="badge badge-lg badge-dot"><i class="bg-danger"></i>Project at risk</span></td>
                                                <td>
                                                    <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-3.jpg"> </a>
                                                        <a
                                                            href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-4.jpg"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center"><span class="me-2">4%</span>
                                                        <div>
                                                            <div class="progress" style="width:100px">
                                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width:4%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><img alt="..." src="./assets/img/social/dribbble.svg" class="avatar avatar-sm rounded-circle me-2"> <a class="text-heading font-semibold" href="#">Design Portfolio</a></td>
                                                <td>23-01-2022</td>
                                                <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In progress</span></td>
                                                <td>
                                                    <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-3.jpg"> </a>
                                                        <a
                                                            href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-4.jpg"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center"><span class="me-2">10%</span>
                                                        <div>
                                                            <div class="progress" style="width:100px">
                                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><img alt="..." src="./assets/img/social/spotify.svg" class="avatar avatar-sm rounded-circle me-2"> <a class="text-heading font-semibold" href="#">Our team&#39;s playlist</a></td>
                                                <td>23-01-2022</td>
                                                <td><span class="badge badge-lg badge-dot"><i class="bg-warning"></i>In progress</span></td>
                                                <td>
                                                    <div class="avatar-group"><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-1.jpg"> </a><a href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-3.jpg"> </a>
                                                        <a
                                                            href="#" class="avatar avatar-xs rounded-circle text-white border border-1 border-solid border-card"><img alt="..." src="./assets/img/people/img-4.jpg"></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center"><span class="me-2">83%</span>
                                                        <div>
                                                            <div class="progress" style="width:100px">
                                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" style="width:83%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end"><a href="#" class="btn btn-sm btn-neutral">View</a> <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card h-full">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-center">
                                        <h5 class="mb-0">Top Performance</h5>
                                        <div class="ms-auto text-end"><a href="#" class="text-sm font-semibold">See all</a></div>
                                    </div>
                                    <div class="list-group gap-4">
                                        <div class="list-group-item d-flex align-items-center border rounded">
                                            <div class="me-4">
                                                <div class="avatar rounded-circle"><img alt="..." src="./assets/img/people/img-1.jpg"></div>
                                            </div>
                                            <div class="flex-fill"><a href="#" class="d-block h6 font-semibold mb-1">Norman Mohrbacher</a><span class="d-block text-sm text-muted">UI Designer</span></div>
                                            <div class="ms-auto text-end">
                                                <div class="dropdown"><a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu"><a href="#!" class="dropdown-item">Action </a><a href="#!" class="dropdown-item">Another action </a><a href="#!" class="dropdown-item">Something else here</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center border rounded">
                                            <div class="me-4">
                                                <div class="avatar rounded-circle"><img alt="..." src="./assets/img/people/img-2.jpg"></div>
                                            </div>
                                            <div class="flex-fill"><a href="#" class="d-block h6 font-semibold mb-1">Leeann Monnet</a><span class="d-block text-sm text-muted">Web Developer</span></div>
                                            <div class="ms-auto text-end">
                                                <div class="dropdown"><a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu"><a href="#!" class="dropdown-item">Action </a><a href="#!" class="dropdown-item">Another action </a><a href="#!" class="dropdown-item">Something else here</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center border rounded">
                                            <div class="me-4">
                                                <div class="avatar rounded-circle"><img alt="..." src="./assets/img/people/img-3.jpg"></div>
                                            </div>
                                            <div class="flex-fill"><a href="#" class="d-block h6 font-semibold mb-1">Kathe Rahimi</a><span class="d-block text-sm text-muted">Marketing Team</span></div>
                                            <div class="ms-auto text-end">
                                                <div class="dropdown"><a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                    <div class="dropdown-menu"><a href="#!" class="dropdown-item">Action </a><a href="#!" class="dropdown-item">Another action </a><a href="#!" class="dropdown-item">Something else here</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>

    <script>
        //Greet User
        var time = new Date().getHours();
        if (time < 4) {
            greeting = "You should be in bed 🙄!";
        }  else if (time < 12) {
            greeting = "Good morning, wash your hands 🌤";
        } else if (time < 16) {
            greeting = "It's lunch 🍛 time, what's on the menu!";
        } else {
            greeting = "Good Evening 🌙, how was your day?";
        }
        document.getElementById("greet").innerHTML = greeting;
    </script>
</body>

</html>