<style type="text/css">
    table .vj {
    background: transparent url(../assets/admin/layout/img/vj.png) left 20px center no-repeat;
    }
    table .jt {
    background: transparent url(../assets/admin/layout/img/js.png) left 20px center no-repeat;
    }
    table .vn {
    background: transparent url(../assets/admin/layout/img/vn.png) left 20px center no-repeat;
    }
    table .vj,table .jt,table .vn{
        text-align: center;
    }
    .img_hiden{display: none;}
</style>
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Quản lý danh sách thành viên</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title="">
                        </a>
                        <!-- <a href="javascript:;" class="remove" data-original-title="" title="">
                        </a> -->
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- table dữ liệu -->
                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="dataTables_length" id="sample_1_length">
                                    <label>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div id="sample_1_filter" class="dataTables_filter">
                            </div>
                        </div>
                    </div>
                    <form id="form" action="<?php echo base_url(); ?>checkflight" method="post">
                        <div id="table" style="display:none">
                            <div class="table-scrollable">
                                <img src="../assets/admin/layout/img/loading_check.gif" class="img_hiden">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info" id="result_table">
                                        <thead>
                                           <tr role="row">
                                                <td colspan="5">Lựa chọn chuyến đi</td>
                                            </tr>
                                            <tr role="row">
                                                <th>Chuyến Bay</th>
                                                <th>Khởi hành</th>
                                                <th>Đến</th>
                                                <th data-tsorter="numeric">Giá</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody class="result_check">
                                        </tbody>
                                    </table>
                                    <?php if (isset($data_check["STRUCTURE"]) == "RoundTrip") {?>
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info">
                                        <thead>
                                           <tr role="row">
                                                <td colspan="5">Lựa chọn chuyến về</td>
                                            </tr>
                                            <tr role="row">
                                                <th>Chuyến Bay</th>
                                                <th>Khởi hành</th>
                                                <th>Đến</th>
                                                <th data-tsorter="numeric">Giá</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody class="roundtrip">
                                        </tbody>
                                    </table>
                                    <?php }?>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                        <ul class="pagination" style="visibility: visible;">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="btncheck" class="btn green">Check</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    //$("#btncheck").click(function(){
        $(".result_check").empty();
        $(".img_hiden").show();
        $("#table").show();
        structure = "<?php echo $data_check["STRUCTURE"]; ?>";
        from = "<?php echo $data_check["FROM"]; ?>";
        to = "<?php echo $data_check["TO"]; ?>";
        day_rep = '<?php echo $data_check["DAY_DEP"]; ?>';
        day_ret = '<?php echo $data_check["DAY_RET"]; ?>';
        adt = <?php echo $data_check["ADT"]; ?>;
        chd = <?php echo $data_check["CHD"]; ?>;
        infant = <?php echo $data_check["INFANT"]; ?>;
        $.ajax({
            url: "<?php echo base_url()?>checkflight/checkvj",
            type: 'POST',
            async:true,
            data: "STRUCTURE="+structure+"&FROM="+from+"&TO="+to+"&DAY_DEP="+day_rep+"&DAY_RET="+day_ret+"&ADT="+adt+"&CHD="+chd+"&INFANT="+infant,
            datatype: 'html',
            success: function(result){
                var dt = $(".check_roundtrip").html();
                $('.roundtrip').prepend("<tr>"+dt+"</tr>"); 
                $(".img_hiden").hide();
                var getdata = $.parseJSON(result);
                var html = "";
                var html1 = "";
                $.each(getdata,function(key,value) {
                    if (key=='dep') {
                            $.each(value,function(key1,data) {
                                html += '<tr>';
                                html += '<td class="f_code vj">'+data['flightno']+'</td>';
                                html += '<td>'+data['dep']+" "+data['deptime']+'</td>';
                                html += '<td>'+data['arv']+" "+data['arvtime']+'</td>';
                                html += '<td>'+data['price']+'</td>';
                                html += '<td><a href="#">Chi tiết+</a></td>';
                                html += '</tr>';
                            });
                    };
                    if (key=='ret') {
                            $.each(value,function(key1,data) {
                                //console.log(value1['dep'])
                                html1 += '<tr>';
                                html1 += '<td class="f_code vj">'+data['flightno']+'</td>';
                                html1 += '<td>'+data['dep']+" "+data['deptime']+'</td>';
                                html1 += '<td>'+data['arv']+" "+data['arvtime']+'</td>';
                                html1 += '<td>'+data['price']+'</td>';
                                html1 += '<td><a href="#">Chi tiết+</a></td>';
                                html1 += '</tr>';
                            });
                    };
               });
                $(".result_check").append(html);
                $(".roundtrip").append(html1);
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>checkflight/checkjt",
            type: 'POST',
            async:true,
            data: "STRUCTURE="+structure+"&FROM="+from+"&TO="+to+"&DAY_DEP="+day_rep+"&DAY_RET="+day_ret+"&ADT="+adt+"&CHD="+chd+"&INFANT="+infant,
            datatype: 'html',
            success: function(results){
                console.log(results);
                $(".img_hiden").hide();
                var getdata = $.parseJSON(results);
                var html = "";
                var html1 = "";
                $.each(getdata,function(key,value) {
                    if (key=='dep') {
                        $.each(value,function(key,data) {
                            html += '<tr>';
                            html += '<td class="f_code jt">'+data['flightno']+'</td>';
                            html += '<td>'+data['dep']+" "+data['deptime']+'</td>';
                            html += '<td>'+data['arv']+" "+data['arvtime']+'</td>';
                            html += '<td>'+data['price']+'</td>';
                            html += '<td><a href="#">Chi tiết+</a></td>';
                            html += '</tr>';
                        });
                    };
                    if (key=='ret') {
                        $.each(value,function(kéy,data) {
                            //console.log(valúe['dep'])
                            html1 += '<tr>';
                            html1 += '<td class="f_code jt">'+data['flightno']+'</td>';
                            html1 += '<td>'+data['dep']+" "+data['deptime']+'</td>';
                            html1 += '<td>'+data['arv']+" "+data['arvtime']+'</td>';
                            html1 += '<td>'+data['price']+'</td>';
                            html1 += '<td><a href="#">Chi tiết+</a></td>';
                            html1 += '</tr>';
                        });
                    };
               });
                $(".result_check").append(html);
                $(".roundtrip").append(html1);
            }
        });
        $.ajax({
            url: "<?php echo base_url(); ?>checkflight/checkvn",
            type: 'POST',
            async:true,
            data: "STRUCTURE="+structure+"&FROM="+from+"&TO="+to+"&DAY_DEP="+day_rep+"&DAY_RET="+day_ret+"&ADT="+adt+"&CHD="+chd+"&INFANT="+infant,
            datatype: 'html',
            success: function(results){
                $(".img_hiden").hide();
                var getdata = $.parseJSON(results);
                var html = "";
                var html1 = "";
                $.each(getdata,function(key,value) {
                    if (key=='dep') {
                            $.each(value,function(key1,data) {
                                //console.log(value1['dep'])
                                html += '<tr>';
                                html += '<td class="f_code vn">'+data['flightno']+'</td>';
                                html += '<td>'+data['dep']+" "+data['deptime']+'</td>';
                                html += '<td>'+data['arv']+" "+data['arvtime']+'</td>';
                                html += '<td>'+data['price']+'</td>';
                                html += '<td><a href="#">Chi tiết+</a></td>';
                                html += '</tr>';
                            });
                    };
                    if (key=='ret') {
                            $.each(value,function(key1,data) {
                                //console.log(value1['dep'])
                                html1 += '<tr>';
                                html1 += '<td class="f_code vn">'+data['flightno']+'</td>';
                                html1 += '<td>'+data['dep']+" "+data['deptime']+'</td>';
                                html1 += '<td>'+data['arv']+" "+data['arvtime']+'</td>';
                                html1 += '<td>'+data['price']+'</td>';
                                html1 += '<td><a href="#">Chi tiết+</a></td>';
                                html1 += '</tr>';
                            });
                    };
               });
                $(".result_check").append(html);
                $(".roundtrip").append(html1);
            
            }
        });
$('td>a').live('click',function(){
    $(this).parent().parent().next().parent().prepend('<tr><td colspan="5">a</td></tr>');
});
   // });
});


var tsorter=function(){"use strict";var a,b,c,d=!!document.addEventListener;return Object.create||(Object.create=function(a){var b=function(){return void 0};return b.prototype=a,new b}),b=function(a,b,c){d?a.addEventListener(b,c,!1):a.attachEvent("on"+b,c)},c=function(a,b,c){d?a.removeEventListener(b,c,!1):a.detachEvent("on"+b,c)},a={getCell:function(a){var b=this;return b.trs[a].cells[b.column]},sort:function(a){var b=this,c=a.target;b.column=c.cellIndex,b.get=b.getAccessor(c.getAttribute("data-tsorter")),b.prevCol===b.column?(c.className="ascend"!==c.className?"ascend":"descend",b.reverseTable()):(c.className="ascend",-1!==b.prevCol&&"exc_cell"!==b.ths[b.prevCol].className&&(b.ths[b.prevCol].className=""),b.quicksort(0,b.trs.length)),b.prevCol=b.column},getAccessor:function(a){var b=this,c=b.accessors;if(c&&c[a])return c[a];switch(a){case"link":return function(a){return b.getCell(a).firstChild.firstChild.nodeValue};case"input":return function(a){return b.getCell(a).firstChild.value};case"numeric":return function(a){return parseFloat(b.getCell(a).firstChild.nodeValue,10)};default:return function(a){return b.getCell(a).firstChild.nodeValue}}},exchange:function(a,b){var c,d=this,e=d.tbody,f=d.trs;a===b+1?e.insertBefore(f[a],f[b]):b===a+1?e.insertBefore(f[b],f[a]):(c=e.replaceChild(f[a],f[b]),f[a]?e.insertBefore(c,f[a]):e.appendChild(c))},reverseTable:function(){var a,b=this;for(a=1;a<b.trs.length;a++)b.tbody.insertBefore(b.trs[a],b.trs[0])},quicksort:function(a,b){var c,d,e,f=this;if(!(a+1>=b)){if(b-a===2)return void(f.get(b-1)>f.get(a)&&f.exchange(b-1,a));for(c=a+1,d=b-1,f.get(a)>f.get(c)&&f.exchange(c,a),f.get(d)>f.get(a)&&f.exchange(a,d),f.get(a)>f.get(c)&&f.exchange(c,a),e=f.get(a);;){for(d--;e>f.get(d);)d--;for(c++;f.get(c)>e;)c++;if(c>=d)break;f.exchange(c,d)}f.exchange(a,d),b-d>d-a?(f.quicksort(a,d),f.quicksort(d+1,b)):(f.quicksort(d+1,b),f.quicksort(a,d))}},init:function(a,c,d){var e,f=this;for("string"==typeof a&&(a=document.getElementById(a)),f.table=a,f.ths=a.getElementsByTagName("th"),f.tbody=a.tBodies[0],f.trs=f.tbody.getElementsByTagName("tr"),f.prevCol=c&&c>0?c:-1,f.accessors=d,f.boundSort=f.sort.bind(f),e=0;e<f.ths.length;e++)b(f.ths[e],"click",f.boundSort)},destroy:function(){var a,b=this;if(b.ths)for(a=0;a<b.ths.length;a++)c(b.ths[a],"click",b.boundSort)}},{create:function(b,c,d){var e=Object.create(a);return e.init(b,c,d),e}}}();
function init() {
    var sorter = tsorter.create('result_table');
}
    
window.onload = init;
</script>