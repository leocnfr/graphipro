<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">添加表格</h4>
            </div>
            <div class="modal-body">
               <form action="{{url('/admin/price-table')}}" method="post" role="form" id="form">

                    <div class="form-group">
                        <label for="format">Format</label>
                        @inject('formats','App\Format')
                        @foreach($formats->showAll() as $format)
                            <div class="checkbox-inline">
                                <label>
                                    <input type="checkbox" value="{{$format->id}}" id="" name="formats[]">{{$format->format}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="papier">Papiers</label>
                        @inject('papiers','App\Papier')
                        @foreach($papiers->showAll() as $papier)
                            <div class="checkbox-inline">
                                <label>
                                    <input type="checkbox" value="{{$papier->id}}" id="" name="papiers[]">{{$papier->papier}}

                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="">Imprimer</label>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="imprimer" id="inputID" value="1" checked="checked">recto
                            </label>
                        </div>
                        <div class="radio-inline">
                        	<label>
                        		<input type="radio" name="imprimer" id="inputID" value="2" >recto et verso
                        	</label>
                        </div>

                    </div>
                   <div class="form-group">
                       <label for="">Pelliculage</label>
                       @inject('pelliculages','App\Pelliculage')
                       @foreach($pelliculages->showAll() as $pelliculage)
                           <div class="checkbox-inline">
                               <label>
                                   <input type="checkbox" value="{{$pelliculage->id}}" id="" name="pelliculages[]">{{$pelliculage->pelliculage}}
                               </label>
                           </div>
                       @endforeach
                   </div>
                   <input type="hidden" name="product_id" value="{{ $product->id }}">
                    {!! csrf_field() !!}
               </form>
                {{--<pre>--}}
                    {{--Formate: --}}
                    {{--Papier: --}}
                    {{--Impremier--}}
                    {{--Pelliculage:--}}
                {{--</pre>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" id="submit">提交</button>
            </div>
        </div>
    </div>
</div>
<script>
$('#submit').click(function () {
    $('#form').submit();
})

</script>