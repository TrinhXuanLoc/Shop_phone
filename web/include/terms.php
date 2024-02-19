
    <!-- page -->
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <div class="product-sec1 border border-danger" style="margin-top:10px; border-radius:10px">
                <ul class="w3_short">
                    <li>
                        <a href="index.php" style="padding:0 0 0 12px" class="font-weight-bold"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
                        <i>></i>
                    </li>
                    <li class="font-weight-bold">Terms of Use</li>
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
		<div class="container py-xl-4 py-lg-2" style="line-height:1.8">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 font-weight-bold" style=" text-align:center;margin-top:-60px;">THỎA THUẬN CUNG CẤP VÀ SỬ DỤNG DỊCH VỤ MẠNG XÃ HỘI</h3>
			<!-- //tittle heading -->
			<h6 class="my-md-4 my-3">Điều 1. Điều khoản định nghĩa</h6>
				<li class="font-weight-light pl-sm-4 mb-2">Người sử dụng dịch vụ mạng xã hội (sau đây gọi là “Người sử dụng”) là cá nhân sở hữu tài khoản mạng xã hội hợp pháp để sử dụng các dịch vụ mạng xã hội trên website của Nhà cung cấp.
					Quy định rằng, dựa vào sự xem xét, cân nhắc của Bộ phận kiểm duyệt nội dung mà bài viết của Người sử dụng được hoặc không được phép đăng tải trên trang mạng xã hội của Nhà cung cấp, trên cơ sở đánh giá nội dung của bài viết
					phải phù hợp với phạm vi thông tin trao đổi của Nhà cung cấp trên trang mạng xã hội ; đồng thời phải tuân theo quy định tại Thỏa thuận này và pháp luật.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Thông tin cá nhân là thông tin gắn với việc xác định danh tính của Người sử dụng, do Người sử dụng đồng ý cung cấp để tạo tài khoản đăng nhập hệ thống mạng xã hội của Nhà cung cấp 
					theo mẫu đăng ký trên trang mạng xã hội.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Thông tin riêng là thông tin mà Người sử dụng cung cấp trên mạng xã hội dưới hình thức không công khai hoặc chỉ công khai cho  một hoặc một nhóm Người sử dụng đã được xác định thông tin
					cá nhân cụ thể.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Thông tin công cộng là thông tin trên mạng xã hội do Nhà cung cấp hoặc Người sử dụng công khai cho tất cả những người sử dụng khác được biết mà không cần xác định thông tin cá nhân cụ thể 
					của những Người sử dụng đó.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Ban quản trị Mạng xã hội là bộ phận trực thuộc Nhà cung cấp, chịu trách nhiệm quản lý hoạt động của trang mạng xã hội; giải quyết các trường hợp vi phạm, khiếu nại của Người sử dụng 
					và các vấn đề khác liên quan trong quá trình quản lý hoạt động trang mạng xã hội.</li>
			<h6 class="my-md-4 my-3">Điều 2. Phạm vi nội dung trao đổi, chia sẻ, cung cấp trên mạng xã hội</h6>
				<p class="font-weight-light pl-sm-4 mb-2">Người sử dụng được tự do trao đổi, chia sẻ, cung cấp thông tin thuộc lĩnh vực công nghệ, khoa học kỹ thuật phục vụ cho hoặc liên quan đến các sản phẩm, dịch vụ trừ các nội dung cấm trao đổi, chia sẻ trên mạng xã hội như sau:</p>
				<li class="font-weight-light pl-sm-4 mb-2">Nội dung chống lại Nhà nước Cộng hòa Xã hội Chủ nghĩa Việt Nam, gây phương hại đến an ninh quốc gia, trật tự an toàn xã hội; phá hoại khối đại đoàn kết dân tộc; tuyên truyền chiến tranh, khủng bố; gây hận thù,
					mâu thuẫn giữa các dân tộc, sắc tộc, tôn giáo.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Nội dung tuyên truyền, kích động bạo lực, dâm ô, đồi trụy, tội ác, tệ nạn xã hội, mê tín dị đoan, phá hoại thuần phong mỹ tục của dân tộc.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Nội dung liên quan đến bí mật nhà nước, bí mật quân sự, an ninh, kinh tế, đối ngoại và những bí mật khác do pháp luật quy định.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Thông tin xuyên tạc, vu khống, xúc phạm uy tín của tổ chức, danh dự và nhân phẩm của cá nhân.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Nội dung quảng cáo, tuyên truyền, mua bán hàng hóa, dịch vụ bị cấm, truyền bá tác phẩm báo chí, văn học, nghệ thuật, xuất bản phẩm bị cấm.</li>
			<h6 class="my-md-4 my-3">Điều 3. Quyền và nghĩa vụ của Người sử dụng dịch vụ mạng xã hội</h6>
				<li class="font-weight-light pl-sm-4 mb-2">Người sử dụng có quyền được hướng dẫn sử dụng các công cụ, tính năng phục vụ cho việc xây dựng nội dung thông tin, tiến hành chia sẻ thông tin và sử dụng các dịch vụ tiện ích trên mạng xã hội.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Người sử dụng có quyền được bảo vệ bí mật thông tin cá nhân, thông tin riêng và các thông tin có liên quan khác theo quy định tại Thỏa thuận này và quy định của pháp luật.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Người sử dụng tự chịu trách nhiệm về các nội dung, hình ảnh của các bình luận, bài viết được đăng tải trên mạng xã hội, cũng như toàn bộ quá trình giao dịch với các đối tác trên mạng xã hội trong quá trình sử dụng dịch vụ mạng xã hội.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Người sử dụng có trách nhiệm hợp tác và cung cấp thông tin phù hợp khi có yêu cầu của cơ quan nhà nước có thẩm quyền để phục vụ hoạt động điều tra, hoặc các công tác thống kê, hoặc các công việc phù hợp khác theo quy định của pháp luật.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Người sử dụng không được xâm phạm, tiếp cận hay sử dụng bất kỳ phần nào trong máy chủ của mạng xã hội. Nghiêm cấm mọi hành vi lợi dụng lỗi hệ thống để trục lợi cá nhân gây thiệt hại đến Nhà cung cấp.</li>
			<h6 class="my-md-4 my-3">Điều 4. Chính sách thu thập, xử lý các thông tin cá nhân của Người sử dụng dịch vụ mạng xã hội</h6>
				<li class="font-weight-light pl-sm-4 mb-2">Nhà cung cấp đảm bảo rằng mọi thông tin cá nhân thu thập được trên website mạng xã hội là dựa trên cơ sở đăng nhập và khai báo của Người sử dụng.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Thông tin được thu thập trên mạng xã hội sẽ được sử dụng rộng khắp trên toàn bộ dịch vụ mạng xã hội mà Nhà cung cấp đang cung cấp cho Người sử dụng, đồng thời sẽ được sử dụng cho tất cả các mục đích trên mạng xã hội, để đảm bảo tối ưu hoá tính năng 
					và hiệu quả của thông tin được sử dụng.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Nhà cung cấp sẽ lưu trữ các thông tin cá nhân do Người sử dụng đăng tải trên các hệ thống nội bộ của Nhà cung cấp trong quá trình cung cấp dịch vụ cho Người sử dụng hoặc cho đến khi hoàn thành mục đích thu thập.</li>
				<li class="font-weight-light pl-sm-4 mb-2">Nhà cung cấp không tiết lộ, chia sẻ, cho thuê, hoặc bán những thông tin cá nhân, thông tin riêng của Người sử dụng cho các tổ chức, cá nhân khác với bất kỳ mục đích nào trừ khi Người sử dụng đồng ý hoặc Nhà cung cấp nhận được yêu cầu cung cấp thông tin 
					từ các cơ quan nhà nước có thẩm quyền.</li>
		</div>
	</div>
	<!-- //privacy -->
