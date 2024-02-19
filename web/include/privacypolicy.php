
    <!-- page -->
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <div class="product-sec1 border border-danger" style="margin-top:10px; border-radius:10px">
                <ul class="w3_short">
                    <li>
                        <a href="index.php" style="padding:0 0 0 12px" class="font-weight-bold"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
                        <i>></i>
                    </li>
                    <li class="font-weight-bold">Nội quy cửa hàng</li>
                </ul>
            </div>
        </div>
    </div>
        <!-- Login user -->
        <?php
            if(isset($_SESSION['login_home'])){
                echo '<p class=" text-capitalize"" style="color:black; font-weight:bold;margin-top:15px; margin-left:1050px">Xin chào:	 '.$_SESSION['login_home'].', '.
                '<a href="index.php?manager=cart&logout=1" class="text-capitalize" style="font-weight:normal">Đăng xuất.</a>'.'</p>';
            }else{
                echo '';
            }
        ?>
        <!-- //Login user -->
	<!-- //page -->
	<!-- privacy -->
	<div class="terms py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 font-weight-bold" style=" text-align:center;margin-top:-60px;">Nội quy cửa hàng</h3>
			<!-- //tittle heading -->
			<h6 class="my-md-4 my-3">ĐIỀU 1: THỜI GIAN HOẠT ĐỘNG CỬA HÀNG</h6>
			<p class="font-weight-light pl-sm-4 mb-2">Cửa hàng hoạt động từ 8h đến 22h hàng ngày. Tết và các ngày khác sẽ có thông báo riêng.
			</p>

			<h6 class="my-md-4 my-3">ĐIỀU 2: QUY ĐỊNH HÀNG HOÁ, DỊCH VỤ KINH DOANH TẠI CỬA HÀNG</h6>
			<p class="font-weight-light pl-sm-4 mb-2">Hàng hóa, dịch vụ kinh doanh tại cửa hàng phải phù hợp với các mặt hàng đã đăng ký trong giấy chứng nhận đăng ký kinh doanh và 
                không thuộc danh mục pháp luật cấm kinh doanh.</p>
			<p class="font-weight-light pl-sm-4 mb-2">Không kinh doanh hàng nhái, hàng lậu, hàng giả, hàng không rõ nguồn gốc.</p>
            <p class="font-weight-light pl-sm-4 mb-2">Hàng hóa có bảo hành thì giấy bảo hành phải ghi rõ thời gian bảo hành và địa điểm bảo hành. Tất cả hàng hóa dịch vụ kinh doanh tại cửa hàng 
                phải có thương mại, giá bán phải niêm yết tại địa điểm kinh doanh bằng VNĐ.</p>
			<h6 class="my-md-4 my-3">ĐIỀU 3: QUY ĐỊNH VỀ NGƯỜI ĐẾN GIAO DỊCH MUA BÁN, THAM QUAN, THI HÀNH CÔNG VỤ TẠI CỬA HÀNG</h6>
			<p class="font-weight-light pl-sm-4 mb-2">Mọi người đến cửa hàng giao dịch mua bán, tham quan, thi hành công vụ phải chấp hành nghiêm chỉnh nội quy tại cửa hàng, các quy định pháp luật 
                hiện hành và sự hướng dẫn của cán bộ nhân viên cửa hàng.</p>
			<p class="font-weight-light pl-sm-4 mb-2">CBNV cơ quan nhà nước vào cửa hàng để thi hành nhiệm vụ phải thông báo, xuất trình chứng minh nhân dân và các giấy tờ có liên quan đến việc 
                thi hành nhiệm vụ với người có thẩm quyền ở cửa hàng.</p>

			<h6 class="my-md-4 my-3">ĐIỀU 4: QUY ĐỊNH ĐỐI VỚI CÁN BỘ NHÂN VIÊN CỬA HÀNG</h6>
			<p class="font-weight-light pl-sm-4 mb-2">  Thực hiện đúng chức trách, nhiệm vụ được phân công, có tác phong đúng mực, thái độ hòa nhã, khiêm tốn khi giao tiếp và giải quyết công việc.</p>
			<p class="font-weight-light pl-sm-4 mb-2"> Hướng dẫn tận tình cho mọi người trong cửa hàng hiểu rõ và chấp hành theo đúng quy định của cửa hàng và các quy định của nhà nước.</p>
			<p class="font-weight-light pl-sm-4 mb-2">  Nghiêm cấm mọi biểu hiện tiêu cực, gian lận, gây cản trở khó khăn trong kinh doanh của cửa hàng.</p>
			<p class="font-weight-light pl-sm-4 mb-2">  Nghiêm cấm uống rượu bia, sử dụng chất kích thích trong thời gian thực hiện nhiệm vụ.</p>

			<h6 class="my-md-4 my-3">ĐIỀU 5: QUY ĐỊNH VỀ ĐẢM BẢO AN TOÀN PHÒNG CHÁY CHỮA CHÁY (PCCC)</h6>
			<p class="font-weight-light pl-sm-4 mb-2">Mọi người nghiêm chỉnh thực hiện đúng quy định về PCCC, phòng chống cháy nổ, các hiệu lệnh, bảng chỉ dẫn thoát hiểm, bảng cấm theo quy định pháp luật
                 PCCC được đặt treo nơi dễ thấy.
			</p>
            <p class="font-weight-light pl-sm-4 mb-2">Nghiêm cấm mua bán, tàng trữ, vận chuyển, sử dụng các chất, vật liệu, dụng cụ dễ cháy, nổ.
			</p>
            <p class="font-weight-light pl-sm-4 mb-2">Không đun nấu, thắp hương, đốt nến, vàng mã trong cửa hàng.
			</p>
            <p class="font-weight-light pl-sm-4 mb-2">Bộ phận phụ trách về PCCC của cửa hàng có trách nhiệm đôn đốc, kiểm tra mọi người thực hiện tốt các quy định về PCCC. Khi có sự cố xảy ra phải bình tĩnh báo động
                 và tìm cách báo ngay cho phòng cảnh sát PCCC TP.
			</p>
            <p class="font-weight-light pl-sm-4 mb-2">Các hành vi vi phạm về quy định PCCC để xảy ra sự cố phải chịu trách nhiệm trước pháp luật.
			</p>
			<h6 class="my-md-4 my-3">ĐIỀU 6: QUY ĐỊNH VỀ ĐẢM BẢO AN NINH TRẬT TỰ TẠI CỬA HÀNG</h6>
			<p class="font-weight-light pl-sm-4 mb-2">Nghiêm cấm mọi hành vi gây rối trật tự trị an trong phạm vi cửa hàng.
			</p>   
            <p class="font-weight-light pl-sm-4 mb-2">Nghiêm cấm tổ chức tham gia đánh đề, hụi, cá cược, bói toán mê tín. Không phổ biến các loại văn hóa phẩm đồi trụy, phản động.
			</p>
            <p class="font-weight-light pl-sm-4 mb-2">Người đang mắc bệnh truyền nhiễm nhưng không áp dụng các biện pháp phòng chống lây lan, người ăn xin, người đang say rượu bia,
                 người đang mắc bệnh tâm thần không được phép vào cửa hàng.
			</p>
            <p class="font-weight-light pl-sm-4 mb-2">Lực lượng bảo vệ trong cửa hàng, trong ca trực có trách nhiệm đảm bảo an ninh, an toàn tài sản, hàng hóa tại cửa hàng, cuối ca trực 
                có bàn giao báo cáo cụ thể tình hình ca trực.
			</p>
             
			<h6 class="mb-md-4 mb-3">ĐIỀU 7: QUY ĐỊNH VỀ VĂN MINH THƯƠNG MẠI</h6>
			    <p class="font-weight-light pl-sm-4 mb-2"> Thực hiện văn minh thương mại: ăn mặc gọn gàng, lịch sự, hòa nhã trong giao tiếp ứng xử với mọi người.</p>
                <p class="font-weight-light pl-sm-4 mb-2"> Trung thực trong kinh doanh, thực hiện mua bán hàng hóa dịch vụ đúng giá niêm yết tại điểm kinh doanh.</p>
                <p class="font-weight-light pl-sm-4 mb-2"> Hàng hóa được sắp xếp gọn gàng, ngăn nắp theo khu vực kinh doanh đảm bảo thẩm mỹ, thông thoáng và yêu cầu phòng chống cháy nổ.</p>
            <h6 class="mb-md-4 mb-3">ĐIỀU 8: QUY ĐỊNH VỀ XỬ LÝ VI PHẠM TẠI CỬA HÀNG</h6>
			<p class="font-weight-light pl-sm-4 mb-2"> Vi phạm liên quan đến pháp luật, cửa hàng sẽ lập văn bản và chuyển cho cơ quan nhà nước có thẩm quyền xử lý.</p>
                <p class="font-weight-light pl-sm-4 mb-2"> Vi phạm nội quy cửa hàng: Công ty sẽ có các hình thức phê bình, cảnh cáo, đình chỉ tạm thời, xử lý riêng đối với các cá nhân vi phạm
                     là CBNV công ty.</p>
		</div>
	</div>
	<!-- //privacy -->
