<?php
echo $this->Html->script('qr-code-styling-1-5-0.min.js');
echo $this->Html->css('animate.min');
echo $this->Html->css('jquery.CalendarHeatmap');
echo $this->Html->script('moment.min.js');
echo $this->Html->script('jquery.CalendarHeatmap.min.js');
echo $this->Html->script('https://cdn.jsdelivr.net/npm/apexcharts');
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.css" integrity="sha256-iwSnUqgAndMlZnwFWAAzto9R/6Un2RBguZEITMb0Olk=" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!--Header-->
<div class="row text-body-secondary">
    <div class="col-10">
        <h1 class="my-0 page_title"><?php echo $title; ?></h1>
    </div>
    <div class="col-2 text-end">

    </div>
</div>

<div class="horizontal-tabs border-bottom my-4">
    <?= $this->Html->link(__('Dashboard'), ['controller' => 'Dashboards', 'action' => 'index', 'prefix' => false], ['class' => 'topMenu active', 'escape' => false]) ?>
    <?= $this->Html->link(__('Site Configuration'), ['prefix' => 'Admin', 'controller' => 'Settings', 'action' => 'update', 'recrud'], ['class' => 'topMenu', 'escape' => false]) ?>
    <?= $this->Html->link(__('User Management'), ['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'], ['class' => 'topMenu', 'escape' => false]) ?>
    <?= $this->Html->link(__('To Do'), ['prefix' => 'Admin', 'controller' => 'Todos', 'action' => 'index'], ['class' => 'topMenu', 'escape' => false]) ?>
    <?= $this->Html->link(__('Contacts'), ['prefix' => 'Admin', 'controller' => 'Contacts', 'action' => 'index'], ['class' => 'topMenu', 'escape' => false]) ?>
    <?= $this->Html->link(__('Audit Trail'), [
        'prefix' => 'Admin',
        'controller' => 'auditLogs', 'action' => 'index',
        //'?' => ['limit' => '25', 'status' => '1']
    ], ['class' => 'topMenu', 'escape' => false]) ?>
    <?= $this->Html->link(__('FAQ'), ['prefix' => 'Admin', 'controller' => 'Faqs', 'action' => 'index'], ['class' => 'topMenu', 'escape' => false]) ?>
</div>

<div class="row">
    <div class="col-md-9 border-end">
        <style>
            /* ACTIVITIES */

            .activities h1 {
                margin: 0 0 20px;
                font-size: 1.4rem;
                font-weight: 700;
            }

            .activity-container {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-template-rows: repeat(2, 150px);
                column-gap: 10px;
            }

            .img-one {
                grid-area: 1 / 1 / 2 / 2;
            }

            .img-two {
                grid-area: 2 / 1 / 3 / 2;
            }

            .img-three {
                display: block;
                grid-area: 1 / 2 / 3 / 4;
            }

            .img-four {
                grid-area: 1 / 4 / 2 / 5;
            }

            .img-five {
                grid-area: 1 / 5 / 2 / 6;
            }

            .img-six {
                display: block;
                grid-area: 2 / 4 / 3 / 6;
            }

            .image-container {
                position: relative;
                margin-bottom: 10px;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
                border-radius: 10px;
            }

            .image-container img {
                width: 100%;
                height: 100%;
                border-radius: 10px;
                object-fit: cover;
            }

            .overlay {
                position: absolute;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                justify-content: flex-end;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(180deg,
                        transparent,
                        transparent,
                        rgba(3, 3, 185, 0.5));
                border-radius: 10px;
                transition: all 0.6s linear;
            }

            .image-container:hover .overlay {
                opacity: 0;
            }

            .overlay h3 {
                margin-bottom: 8px;
                margin-right: 10px;
                color: #fff;
            }

            /* LEFT BOTTOM */

            .left-bottom {
                display: grid;
                grid-template-columns: 55% 40%;
                gap: 40px;
            }

            a.header:link {
                color: #ffffff;
                text-decoration: none;
            }

            a.header:visited {
                color: #ffffff;
                text-decoration: none;
            }

            a.header:hover {
                color: #ffffff;
                text-decoration: none;
            }
        </style>

        <div class="d-none d-sm-block">
            <div class="activity-container">
                <div class="image-container img-one">
                    <?= $this->Html->image('header/nasi lemak-min.jpg', ['alt' => '']); ?>
                    <div class="overlay">
                   
                    </div>
                </div>
                <div class="image-container img-two">
                    <?= $this->Html->image('header/tiramisu-min.jpg', ['alt' => '']); ?>
                    <div class="overlay">
                
                    </div>
                </div>
                <div class="image-container img-three">
                    <?= $this->Html->image('header/roasted-chicken-min.jpg', ['alt' => '']); ?>
                    <div class="overlay">
                       
                    </div>
                </div>
                <div class="image-container img-four">
                    <?= $this->Html->image('header/cendol-min.jpg', ['alt' => '']); ?>
                    <div class="overlay">
                 
                    </div>
                </div>
                <div class="image-container img-five">
                    <?= $this->Html->image('header/rendang-min.jpg', ['alt' => '']); ?>
                    <div class="overlay">
                        
                    </div>
                </div>
                <div class="image-container img-six">
                    <?= $this->Html->image('header/cake chocolate-min.jpg', ['alt' => '']); ?>
                    <div class="overlay">
                      
                    </div>
                </div>
            </div>
        </div>


        <div class="row py-3">
            <div class="col-8 fs-5 fw-medium text-body-secondary">
                Report
            </div>
            <div class="col-4 text-end">
                <button class="btn btn-xs btn-outline-warning me-2" data-bs-toggle="collapse" href="#chartCollapse" role="button" aria-expanded="true" aria-controls="chartCollapse">
                    Hide Chart
                </button>
                <button onClick="window.location.reload();" class="btn btn-xs btn-primary">Refresh</button>

            </div>
        </div>
        <div class="row px-2 mb-4">
            <div class="col-md-3 border rounded-start pt-3 pb-3 bg-body-tertiary">
                <span class="fs-3"><?php echo $total_user; ?> <i class="fa-solid fa-caret-up text-primary"></i></span><br />
                Total Registered Users
            </div>
            <div class="col-md-3 border pt-3 pb-3 bg-body-tertiary">
                <span class="fs-3"><?php echo $total_contact; ?> <i class="fa-solid fa-caret-up text-primary"></i></span><br />
                Total Contacts
            </div>
            <div class="col-md-3 border pt-3 pb-3 bg-body-tertiary">
                <span class="fs-3"><?php echo $total_auditlog; ?> <i class="fa-solid fa-caret-up text-primary"></i></span><br />
                Total Logged Audit
            </div>
            <div class="col-md-3 border rounded-end pt-3 pb-3 bg-body-tertiary">
                <span class="fs-3"><?php echo $total_todo; ?> <i class="fa-solid fa-caret-up text-primary"></i></span><br />
                Total To Do Task
            </div>
        </div>

        <div class="collapse show" id="chartCollapse">
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="users" data-waffly-title="Total Active Users" data-waffly-value="<?php echo $user_percent; ?>%">
                        <div class="title">Total Active Users</div>
                        <meter class="users" value="50" max="100"></meter>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="todo" data-waffly-title="Total Pending To Do Task" data-waffly-value="<?php echo $pending_todo_percent; ?>%">
                        <div class="title">Total Pending To Do Task</div>
                        <meter class="todo" value="50" max="100"></meter>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="contact" data-waffly-title="Total Pending Contact" data-waffly-value="<?php echo $pending_contact_percent; ?>%">
                        <div class="title">Total Pending Contact</div>
                        <meter class="contact" value="50" max="100"></meter>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="faq" data-waffly-title="Total Active FAQ" data-waffly-value="<?php echo $pending_faq_percent; ?>%">
                        <div class="title">Total Active FAQ</div>
                        <meter class="faq" value="50" max="100"></meter>
                    </div>
                </div>
            </div>



            <?php echo $this->Html->script('waffly.js'); ?>
            <script>
                $(document).ready(function() {
                    $('.users').waffly({
                        graph_width: 180,
                        dot_gap: 3,
                        dot_radius: '3px',
                        graph_color: '#B42B4D',
                        //graph_title_color: '#555',
                        graph_value_color: '##B42B4D',
                        dot_opacity: .2,
                        graph_reverse: true,
                        graph_animate: true,
                    });

                    $('.todo').waffly({
                        graph_width: 180,
                        dot_gap: 3,
                        dot_radius: '3px',
                        graph_color: '#DAF069',
                        //graph_title_color: '#555',
                        graph_value_color: '#DAF069',
                        dot_opacity: .2,
                        graph_reverse: true,
                        graph_animate: true,
                    });

                    $('.contact').waffly({
                        graph_width: 180,
                        dot_gap: 3,
                        dot_radius: '3px',
                        graph_color: '#924B9C',
                        //graph_title_color: '#555',
                        graph_value_color: '#924B9C',
                        dot_opacity: .2,
                        graph_reverse: true,
                        graph_animate: true,
                    });

                    $('.faq').waffly({
                        graph_width: 180,
                        dot_gap: 3,
                        dot_radius: '3px',
                        graph_color: '#E28401',
                        //graph_title_color: '#555',
                        graph_value_color: '#E28401',
                        dot_opacity: .2,
                        graph_reverse: true,
                        graph_animate: true,
                    });

                    $('.my_chart').waffly({
                        graph_reverse: false,
                        graph_animate: true,
                        style_override: true,
                        total_dots: 62,
                    });
                });
            </script>
        </div>

        <?php //echo json_encode($formattedResults); 
        ?>

        <div class="card bg-body-tertiary border-0 shadow mb-4">
            <div class="card-body">
                <div class="card-title mb-0">Activities</div>
				<div class="dsline mb-3"></div>
                <div id="heatmap-1"></div>
            </div>
        </div>

        <script>
            var data = <?php echo json_encode($formattedResults); ?>;
            $("#heatmap-1").CalendarHeatmap(data, {
                title: null,
                months: 12,
                //weekStartDay: 1,
                //lastMonth: 1,
                //lastMonth: "current month",
                //lastYear: "current year",
                labels: {
                    days: true,
                    months: true,
                    custom: {
                        weekDayLabels: null,
                        monthLabels: null
                    }
                },
                tiles: {
                    shape: "square"
                },
                legend: {
                    show: true,
                    align: "right",
                    minLabel: "Less",
                    maxLabel: "More",
                    divider: " to "
                },
                tooltips: {
                    show: false,
                    options: {}
                }
            });
        </script>

        <?php //echo json_encode($totalActivityByMonth); 
        ?>
        <?php
        // Decode the JSON data
        $totalActivityByMonth = json_encode($totalActivityByMonth);
        $dataArray = json_decode($totalActivityByMonth, true);

        // Create an array to hold the formatted results
        $formattedArray = [];

        // Loop through the data array and add the month and count to the formatted array
        foreach ($dataArray as $entry) {
            //$formattedArray[] = $entry['month'];
            $formattedArray[] = $entry['count'];
        }
        $formattedJson = json_encode($formattedArray);
        //echo $formattedJson;

        $formattedMonthArray = [];

        // Loop through the data array and add the month and count to the formatted array
        foreach ($dataArray as $entry) {
            //$formattedArray[] = $entry['month'];
            $formattedMonthArray[] = $entry['month'];
        }
        $formattedMonthJson = json_encode($formattedMonthArray);
        //echo $formattedMonthJson;
        ?>

        <div class="row mb-4">
            <div class="col-md-4">
                <div id="chart_line"></div>
                <script>
                    var options = {
                        chart: {
                            type: 'line',
                            toolbar: {
                                show: false
                            },
                        },
                        stroke: {
                            curve: 'stepline',
                        },
                        series: [{
                            name: 'sales',
                            data: [35, 45, 55, 20, 11, 42, 32, 64, 64, 64, 50, 35]
                        }],
                        xaxis: {
                            categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                            min: 0,
                            max: 13
                        },
                        yaxis: {
                            min: 0
                        },
                        markers: {
                            size: 1,
                        },
                        fill: {
                            type: 'solid'
                        }
                    }

                    var chart = new ApexCharts(document.querySelector("#chart_line"), options);

                    chart.render();
                </script>
            </div>
            <div class="col-md-4">
                <div id="chart_bar"></div>
                <script>
                    var options = {
                        chart: {
                            type: 'bar',
                            toolbar: {
                                show: false
                            },
                        },
                        stroke: {
                            curve: 'stepline',
                        },
                        series: [{
                            data: <?php echo $formattedJson; ?>
                        }],
                        xaxis: {
                            categories: <?php echo $formattedMonthJson; ?>,
                        },
                        yaxis: {
                            min: 0
                        },
                        markers: {
                            size: 1,
                        },
                        fill: {
                            type: 'solid'
                        }
                    }

                    var chart = new ApexCharts(document.querySelector("#chart_bar"), options);

                    chart.render();
                </script>
            </div>
            <div class="col-md-4">
                <div id="chart_tree"></div>
                <script>
                    var options = {
                        series: [{
                            name: "Desktops",
                            data: [10, 41, 35, 51, 49, 62, 69, 91, 100]
                        }],
                        chart: {
                            type: 'line',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chart_tree"), options);
                    chart.render();
                </script>
            </div>
        </div>


			<style>
			/* Modernized Card Styles */
			.card {
				background-color: #ffffff;
				border-radius: 12px;
				border: none;
				box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
				overflow: hidden;
				transition: transform 0.3s ease, box-shadow 0.3s ease;
			}

			.card:hover {
				transform: translateY(-5px);
				box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
			}

			.card-title {
				font-size: 1.25rem;
				font-weight: bold;
				color: #495057;
				margin-bottom: 0;
			}

			.btn-outline-warning {
				font-size: 0.875rem;
				padding: 0.375rem 0.75rem;
				border-radius: 20px;
				transition: background-color 0.3s ease, color 0.3s ease;
			}

			.btn-outline-warning:hover {
				background-color: #ffc107;
				color: #ffffff;
			}

			.dsline {
				height: 4px;
				width: 100%;
				background: linear-gradient(90deg, rgba(255, 0, 0, 0.2) 0%, red 50%, rgba(255, 0, 0, 0.2) 100%);
				background-size: 200% 100%;
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

			.card-img-top {
				object-fit: cover;
				width: 100%;
				height: 200px;
				border-radius: 8px;
				transition: transform 0.3s ease, box-shadow 0.3s ease;
			}

			.card-img-top:hover {
				transform: scale(1.05);
				box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
			}

			.card-text {
				font-size: 1rem;
				font-weight: bold;
				color: #fff;
				margin-top: 8px;
				transition: color 0.3s ease;
			}

			.card-text:hover {
				color: #000000;
			}
			</style>

			<div class="card bg-body-tertiary border-0 shadow mb-4">
			<div class="card-body text-body-secondary">
				<div class="card-title">
				<div class="row py-3 align-items-center">
					<div class="col-8 text-body-secondary">Editor Choice</div>
					<div class="col-4 text-end">
					<?= $this->Html->link(
						'<i class="fa-solid fa-utensils"></i> Recipe',
						'https://resepichenom.com/',
						[
						'class' => 'btn btn-xs btn-outline-warning me-2',
						'escapeTitle' => false,
						'target' => '_blank',
						'_full' => true
						]
					) ?>
					</div>
				</div>
				</div>
				<div class="dsline mb-3"></div>

				<div class="row text-center">
				<div class="col-md-4 mb-3">
					<?= $this->Html->image('header/asam laksa-min.jpg', ['alt' => '', 'class' => 'card-img-top']); ?>
					<p class="card-text">Asam Laksa</p>
				</div>
				<div class="col-md-4 mb-3">
					<?= $this->Html->image('header/strawberry-min.jpg', ['alt' => '', 'class' => 'card-img-top']); ?>
					<p class="card-text">Strawberry Mint Mojito</p>
				</div>
				<div class="col-md-4 mb-3">
					<?= $this->Html->image('header/Chicken Satay-min.jpg', ['alt' => '', 'class' => 'card-img-top']); ?>
					<p class="card-text">Chicken Satay</p>
				</div>
				<div class="col-md-4 mb-3">
					<?= $this->Html->image('header/ayam berempah-min.jpg', ['alt' => '', 'class' => 'card-img-top']); ?>
					<p class="card-text">Ayam Berempah</p>
				</div>
				<div class="col-md-4 mb-3">
					<?= $this->Html->image('header/Asam Pedas-min.jpg', ['alt' => '', 'class' => 'card-img-top']); ?>
					<p class="card-text">Asam Pedas</p>
				</div>
				<div class="col-md-4 mb-3">
					<?= $this->Html->image('header/Churros-min.jpg', ['alt' => '', 'class' => 'card-img-top']); ?>
					<p class="card-text">Churros</p>
				</div>
				</div>
			</div>
			</div>


       

    </div>
    <div class="col-md-3">

        <?php echo $this->Form->create(null, ['valueSources' => 'query', 'url' => ['controller' => '#', 'action' => '#']]); ?>
        <fieldset>
            <div class="mb-1"><?php echo $this->Form->control('search', ['required' => false, 'label' => false, 'placeholder' => 'Search...', 'class' => 'form-control border-0 bg-body-tertiary shadow']); ?></div>
        </fieldset>

        <div class="card gradient-border mb-3">
            <div class="card-body">
                <div class="card-title mb-0">Profile</div>
				<div class="dsline mb-3"></div>
                <div class="row">
                    <div class="col-5 text-center">
                        <?php if ($this->Identity->get('avatar') != NULL) {
                            echo $this->Html->image('../files/Users/avatar/' . $this->Identity->get('slug') . '/' . $this->Identity->get('avatar'), ['class' => 'w-px-40 rounded', 'width' => '100px', 'height' => '100px']);
                        } else
                            echo $this->Html->image('avatar_default.png', ['alt' => 'avatar', 'class' => 'w-px-40 h-auto rounded', 'width' => '100px', 'height' => '100px']); ?>
                    </div>
                    <div class="col-7">
                        <?php echo $this->Identity->get('fullname'); ?>
                        <br />
                        <?php if ($this->Identity->get('user_group_id') == 1) {
                            echo 'Administrator';
                        } elseif ($this->Identity->get('user_group_id') == 2) {
                            echo 'Moderator';
                        } elseif ($this->Identity->get('user_group_id') == 3) {
                            echo 'User';
                        } else
                            echo 'Error';
                        ?>
                        <br />
                        <div class="mt-4 text-end">
                            <a class="btn btn-outline-warning btn-xs" data-bs-toggle="collapse" href="#collapseActivity" role="button" aria-expanded="false" aria-controls="collapseActivity">
                                Account Activity
                            </a>
                        </div>

                    </div>

                    <br /><br />

                </div>
                <div class="collapse" id="collapseActivity">
                    <div class="table-responsive">
                        <table class="table table-sm table-border mb-0 table_transparent table-hover">
                            <tr>
                                <th>Action</th>
                                <th>Date/Time</th>
                            </tr>
                            <?php foreach ($userLogs as $userLog) : ?>
                                <tr>
                                    <td>
                                        <?php if ($userLog->action == 'Login') {
                                            echo '<span class="badge bg-success">Login</span>';
                                        } elseif ($userLog->action == 'Logout') {
                                            echo '<span class="badge bg-danger">Logout</span>';
                                        } else
                                            echo '<span class="badge bg-secondary">Error</span>';
                                        ?>
                                    </td>
                                    <td><?php echo date('M d, Y (h:i A)', strtotime($userLog->created)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-body-tertiary border-0 shadow mb-4">
            <div class="card-body text-body-secondary">
                <div class="card-title-light mb-0">To Do Task</div>
                <div class="dsline mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-sm table-border mb-0 table_transparent table-hover">
                        <?php foreach ($todo_list as $todos) : ?>
                            <tr>
                                <td>
                                    <?php if ($todos->status == 'Pending') {
                                        echo '<span class="badge rounded-pill text-bg-warning">' . $todos->status . '</span>';
                                    } else
                                        echo '<span class="badge rounded-pill text-bg-primary">' . $todos->status . '</span>';
                                    ?>
                                </td>
                                <td>
                                    <?php echo $todos->task; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>



            </div>
        </div>

        <div class="row text-center">
            <div class="col-6 pe-1 pb-2">
                <span class="developer">
                    <?php if ($this->Identity->get('avatar') != NULL) {
                        echo $this->Html->image('../files/Users/avatar/' . $this->Identity->get('slug') . '/' . $this->Identity->get('avatar'), ['class' => 'w-px-40 rounded-circle', 'width' => '100px', 'height' => '100px']);
                    } else
                        echo $this->Html->image('avatar_default.png', ['alt' => 'avatar', 'class' => 'w-px-40 h-auto rounded-circle', 'width' => '100px', 'height' => '100px']); ?>
                    Asyraf-wa
                </span>
            </a>
        </div>

       
		<div class="row text-center">
      <div class="col-6 pe-1 pb-2">
        <div class="card bg-body-tertiary border-0 shadow">
          <div class="card-body text-body-secondary">
          <i class="fa-solid fa-cake-candles"style="color: pink;" ></i>
            <br />
            Dessert
          </div>
        </div>
      </div>
      <div class="col-6 ps-1 pb-2">
        <div class="card bg-body-tertiary border-0 shadow">
          <div class="card-body text-body-secondary">
          <i class="fa-solid fa-mug-hot"style="color: brown;" ></i>
            <br />
            Beverage
          </div>
        </div>
      </div>

	  <div class="col-6 pe-1 pb-2">
        <div class="card bg-body-tertiary border-0 shadow">
          <div class="card-body text-body-secondary">
          <i class="fa-solid fa-pizza-slice"style="color: yellow;" ></i>
            <br />
            Western
          </div>
        </div>
      </div>
      <div class="col-6 ps-1 pb-2">
        <div class="card bg-body-tertiary border-0 shadow">
          <div class="card-body text-body-secondary">
		  <i class="fa-solid fa-bowl-food"style="color: white;" ></i>
            <br />
            Local Cuisine
          </div>
        </div>
      </div>

     
    </div>

    <div class="card bg-body-tertiary border-0 shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-2 mt-1">
          </div>
          <div class="col-10">
            <?= $this->Html->link(
                '<i class="fa-solid fa-angles-right"></i> ',
                'https://www.reciperadar.com/',
                ['class' => 'btn btn-xs btn-outline-warning me-2', 'escapeTitle' => false, 'target' => '_blank', '_full' => true]
              ) ?>
            <div class="article-title mt-1">Ingredient Tracker</div>
          </div>
        </div>
      </div>
    </div>

    <div class="card bg-body-tertiary border-0 shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-2 mt-1">
          </div>
          <div class="col-10">
          <?= $this->Html->link(
                '<i class="fa-regular fa-newspaper"></i></i> ',
                'https://siraplimau.com/',
                ['class' => 'btn btn-xs btn-outline-warning me-2', 'escapeTitle' => false, 'target' => '_blank', '_full' => true]
              ) ?>
            <div class="article-title mt-1">News</div>
          </div>
        </div>
      </div>
    </div>

    

        <div class="card bg-body-tertiary border-0 shadow mb-4">
            <div class="card-body text-body-secondary">
                <div class="row">
                    <div class="col-8">
                        <div class="card-title mb-0">Scan</div>
                    </div>
                </div>
                
                <div id="qr" align="center"></div>
                <script type="text/javascript">
                    const qrCode = new QRCodeStyling({
                        width: 130,
                        height: 130,
                        margin: 0,
                        //type: "svg",
                        data: "<?php echo $this->request->getUri(); ?>",
                        dotsOptions: {
                            //color: "#4267b2",
                            type: "dots"
                        },
                        cornersSquareOptions: {
                            type: "dots",
                            color: "#007bff",
                        },
                        cornersDotOptions: {
                            type: "dots"
                        },
                        backgroundOptions: {
                            //color: "#ffffff",
                        },
                        imageOptions: {
                            crossOrigin: "anonymous",
                            margin: 20
                        }
                    });

                    qrCode.append(document.getElementById("qr"));
                    //qrCode.download({ name: "qr", extension: "png" });
                </script>
            </div>
        </div>

       
                </div>
            </div>
        </div>

    </div>
</div>

