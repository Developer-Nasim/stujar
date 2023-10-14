<section class="template-need">
    <div class="container">
        <!-- Section Headding -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-headding">
                    <h2 class="text-dark">Find Your Shop</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 align-items-center">
                <form action="{{URL::to('members')}}" class="row g-3 align-items-center" method="post">
                  @csrf
                  <input name="member_search" type="hidden" value="member">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <input 
                          name="member_name"
                          id="member_name"
                          type="text"
                          value="{{ $member_name ?? '' }}"
                          class="form-control fs-4"
                          placeholder="Shop name..."
                          autocomplete="off"
                        >
                      </div>
                      <div style="width:100%;position:relative;z-index:2">
                        <div id="member_searched"></div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <select name="member_floor" class="form-select fs-4">
                        @php 
                        $arr_floor = ['Floor...','Ground','First','Second','Third'];
                        @endphp
                            @for($i=0;$i<sizeof($arr_floor);$i++)
                                @if(!empty($member_floor) && $member_floor == $i)
                                    <option selected="selected" value={{$i}}>{{$arr_floor[$i]}}</option>
                                @else
                                    <option value={{$i}}>{{$arr_floor[$i]}}</option>
                                @endif                            
                            @endfor            
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="button-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<style>
#member_searched {
    position: absolute;
    background: #fff;
    max-height: 400px;
    overflow-y: scroll;
    width: 100%;
}
#member_searched a {
    display: block;
    padding: 10px;
    border-bottom: 1px solid #ddd;
    border-left: 5px solid #f1f1f1;
}
</style>
