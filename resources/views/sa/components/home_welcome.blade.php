<div class="container">
    @if(!empty($welcome->welcome_ticker))
        <div id="marquee-cont">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="100px" style="background:#db1610;">
                  <button id="ticker-title">Notice :</button>
                </td>
                <td id="marquee">
                  <marquee onmouseover="this.stop();" onmouseout="this.start();" id='scroll'>
                    {{ $welcome->welcome_ticker ?? '' }}
                  </marquee>
                </td>
              </tr>
            </table>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-10 offset-lg-1 text-center mt-5">
            <div class="hero-caption pb-200">			
                {!! $welcome->text_one ?? '' !!}
                {!! $welcome->text_two ?? '' !!}
            </div>
        </div>
    </div>
</div>
<div class="custom-shape-divider-bottom-1638549227">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>