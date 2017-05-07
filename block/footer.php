<footer class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright text-center">
                    <p>&copy; romecody.com 2017 - All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End Footer Section -->


<!-- Scroll-up -->
<div class="scroll-up">
    <a href="#home"><i class="fa fa-angle-up"></i></a>
</div>

<!-- Javascript files -->
<script src="assets/js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/jquery.inview.min.js"></script>
<script src="assets/js/jquery.easypiechart.js"></script>
<script src="assets/js/jquery.shuffle.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="assets/js/jquery.fitvids.js"></script>
<script src="assets/js/scripts.js"></script>
<script>
    function initMap() {
        var uluru = {lat: 10.835335, lng: 106.730088};
        /*
        * Truy cập website: http://www.latlong.net/ để lấy Latitude và Longitude. Chỉ cần nhập địa chỉ Enter sẽ hiện 2 thông số kia
        * Sau đó thay vào phần:  var uluru = {lat: 10.835335, lng: 106.730088};
         * */
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: mapu
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD61ZBiwRv39KA6sNwkvH4ln3qBXNsN7Ec&callback=initMap"></script>
