<table class="table table-sm table-bordered">
	<thead>
		<tr>
			<th>Menu</th>
			<th>To Do</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($list as $lists) : ?>

			<tr
				id="status-todo-<?= $lists->id ?>"
				class="
					<?php if($lists->status) : ?>
						bg-secondary
					<?php endif ?>
				"
			>

				<td>
					<div class="d-flex justify-content-center">
						<div class="p-1">
							<div class="form-check form-switch">
							    <input
							    	type="checkbox" role="switch" 
							    	class="form-check-input" id="status-<?= $lists->id ?>"
							    	onclick="changeStatusTodo(<?= $lists->id ?>)"
							    	<?php if($lists->status) : ?>
							    		checked
							    	<?php endif ?>
							    >
							</div>
						</div>

						<div class="p-1">
							<button
								type="button"
								class="btn btn-outline-danger"
								onclick="deleteTodo(<?= $lists->id ?>)"
								title="Hapus To do"
							>
								<span class="fw-bolder">X</span>
							</button>
						</div>
					</div>
				</td>
				<td>
					<?= $lists->name ?>
				</td>
				
			</tr>

		<?php endforeach ?>
			
	</tbody>
</table>