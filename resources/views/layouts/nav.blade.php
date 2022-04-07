<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #5f3998;">
    <a class="navbar-brand" href="/">
        <img src="https://www.erp.wc-hospital.go.th/argon/img/brand/logo.png" width="45" height="30"
            class="d-inline-block align-top" alt="รพ.วัดจันทร์ฯ">
        Watchan-C19 Report :
        <small>
            ระบบดึงรายงานข้อมูลผู้ป่วย Covid-19
        </small>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">
                    &nbsp;
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}">
            <input class="form-control mr-sm-2 basicDate" name="start" placeholder="จากวันที่" readonly>
            <input class="form-control mr-sm-2 basicDate" name="end" placeholder="ถึงวันที่" readonly>
            <button class="btn btn-light my-2 my-sm-0" type="submit">
                <i class="fa fa-search"></i>
                ค้นหา
            </button>
        </form>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
