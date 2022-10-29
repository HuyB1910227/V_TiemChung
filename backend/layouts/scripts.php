<!-- Liên kết Jquery -->
<script src="/V_TiemChung/assets/vendor/jquery/jquery-3.6.1.min.js"></script>
<!-- Liên kết Boostrap -->
<script src="/V_TiemChung/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/V_TiemChung/assets/vendor/plugin_validate/jquery.validate.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/V_TiemChung/assets/vendor/chart/Chart.min.js"></script>



<script>
    $(document).ready(function(){
        var currentURL = window.location.href;
        var t = $('nav#sidebar div li.nav-item a');
        currentURL = currentURL.slice(16);
        console.log(currentURL);
        console.log(typeof t);
        t.each(function(){
            if($(this).attr("href") == currentURL){
                $(this).parent().addClass('active');
            }
        })
        
        
    })
   
    
</script>

<script src="/V_TiemChung/assets/backend/js/Validate-coso.js"></script>
<script src="/V_TiemChung/assets/backend/js/Validate-vaccine.js"></script>
<script src="/V_TiemChung/assets/backend/js/Validate-lichtiem.js"></script>
