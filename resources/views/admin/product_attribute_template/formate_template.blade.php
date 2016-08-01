<template id="format-list">
	<table class="table table-hover">
		<tr v-for="format in formats">
			<td>@{{format.format}} <br>
				<img src="/storage/uploads/@{{ format.img }}" alt="" style="width: 100px;height: 50px">
			</td>

			<td>
				<button class="btn btn-danger" @click="delFormat(format)">删除</button>
				<button type="button" class="btn btn-default" data-toggle="modal"
						data-target="#modal"
						data-id="@{{ format.id }}"
						data-format="@{{ format.format }}">
					编辑
				</button>
			</td>
		</tr>
	</table>
	<div class="modal fade" tabindex="-1" role="dialog" id="modal" data-toggle="modal"
		 aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="/admin/format/" method="post" role="form" enctype="multipart/form-data" id="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Format</h4>
					</div>
					<div class="modal-body">
						{!! method_field('PUT') !!}
						<input type="hidden" id="id" name="id">
						<div class="form-group">
							<label for="">Format</label>
							<input type="text" class="form-control" name="format" id="format" placeholder="">
						</div>
						<div class="form-group">
							<label for="">图片</label>
							<input type="file" name="img">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" id="submit">Save changes</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script>
		$('#modal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var format = button.data('format');
			var id = button.data('id');
			var modal = $(this);
			modal.find('#format').val(format);
			modal.find('#id').val(id);

		});

	</script>
</template>
