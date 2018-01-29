<h1 class="mt-3">Dashboard</h1>
<hr>
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card text-white mb-3" >
            <div class="card-heading bg-info p-3">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <h2>All Book</h2>
                        <p id="book_amount"></p>
                    </div>
                </div>
            </div>
            <a class="card-footer" href="books">
                <span class="pull-left text-info">View Details</span>
                <span class="pull-right  text-info"><i class="fa fa-arrow-circle-right"></i></span>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card text-white mb-3" >
            <div class="card-heading bg-success p-3">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <h2>Member</h2>
                        <p id="member_active"></p>
                    </div>
                </div>
            </div>
            <a class="card-footer" href="member">
                <span class="pull-left text-success">View Details</span>
                <span class="pull-right  text-success"><i class="fa fa-arrow-circle-right"></i></span>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card text-white mb-3" >
            <div class="card-heading bg-danger p-3">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-credit-card fa-5x"></i>
                    </div>
                    <div class="col-9 text-right">
                        <h2>Fine</h2>
                        <p id="fine_amount"></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span class="pull-left text-danger" id="debt"></span>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-12 mb-5">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-pie-chart fa-fw"></i> Book Category Chart
            </div>
            <div class="card-body">
                <div id="catagorychart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-12 mb-5">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-line-chart fa-fw"></i> Borrow Chart
            </div>
            <div class="card-body">
                <div id="transaction"></div>
            </div>
        </div>
    </div>
</div>
