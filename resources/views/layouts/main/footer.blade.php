<footer class="footer">
    <div class="container">
        <div class="social-area pull-right">
            <a class="btn btn-social btn-facebook btn-simple">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a class="btn btn-social btn-twitter btn-simple">
                <i class="fa fa-twitter"></i>
            </a>
        </div>
        <div class="pull-right copyright">
            @if(Auth::check()) 
            <a href="{{ route('log-out') }}">
                <i class="fa fa-power-off"></i>
                <small>Logout</small>
            </a>
            @endif
        </div>
        <div class="copyright pull-left">
            &copy; <?php echo date("Y") ?>. <a href="http://www.cimplicity.co.ke" target="_blank">A Cimplicity App</a>. All Rights Reserved.
        </div>
    </div>
</footer>