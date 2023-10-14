<style>
		.main_box{
    position: relative;
    background: #f3f3f3;
    padding: 10px 20px;
    margin: 0 10px;
    
}
.icon{
    background-image: linear-gradient(310deg,#ff5825,#e9730e,#ff5825);
    display: inline;
    position: absolute;
    top: -28px;
    left: 25px;
    height: 55px;
    width: 55px;
    padding: 5px;
}
.icon:before {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  border-bottom: 8px solid #f3f3f3;
  border-left: 8px solid transparent;
  width: 0;
}
.main_box:before {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  border-bottom: 15px solid #fff;
  border-left: 20px solid transparent;
  width: 0;
}
.choose_us_description{
    font-size: 13px;
}
	</style>
	<div class="container mb-4 pb-4">
		<div class="analytics-toll-content">
			<h2 class="text-center px-4">Why Buy From<span class="text-gradient"> Us</span></h2>
		</div>
			
		<div class="row my-4">  
			@foreach($home_buy_from_us->upload as $upload)
			<div class="col-md-3 col-12 my-4 pt-4">
				<div class="main_box mt-5 h-100">
					<div class="icon">
						<img src="{{ asset( 'images/uploads/small/'.$upload['file']) }}" alt="">  
					</div>
					<h3 class="mt-5 text-gradient">{{$upload['name']}}</h3>
					<div class="choose_us_description mt-5">{{$upload['caption']}}</div> 
				</div>
			</div>
			@endforeach
		</div>
	</div>