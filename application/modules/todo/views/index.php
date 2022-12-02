<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Todo List | Muhammad Rafly Ramadhan</title>

	<!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-light">

	<div class="container col-10 col-lg-7 mx-auto py-5">
		
		<div class="card">
			<div class="card-header bg-primary border-white">
				<h5 class="text-white">Todo List</h5>
			</div>

			<div class="card-body">

				<div class="mb-3">
					<form id="form-todo">
						<div class="input-group">
							<input
								type="text"
								name="todo" id="todo" class="form-control"
								placeholder="Ketik Todo List"
								minlength="3" maxlenght="255"
								autocomplete="off" required
							>

							<button
								type="submit"
								form="form-todo" id="btn-todo" class="btn btn-primary"
							>
								Kirim
							</button>
						</div>
					</form>
				</div>

				<div class="mb-3">

					<hr>

					<p class="lead">
						Todo List
					</p>

					<hr>

					<div id="div-todo"></div>
				</div>
					
			</div>
		</div>

	</div>

	<!-- Bootstrap 5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<!-- jQuery -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

	<script type="text/javascript">

		$('#form-todo').on('submit', function(e) {
			e.preventDefault()

			$.ajax({
				url: "<?= site_url('todo/save') ?>",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				processData: false,

				beforeSend: ()=> {
					$('#btn-todo').attr('disabled', true).text('Sedang Menyimpan ...')
				},

				success: (data)=> {
					$('#todo').val('')
					$('#btn-todo').attr('disabled', false).text('Kirim')
					getList()
				},

				error: ()=> {
					alert('Gagal Menyimpan')
					$('#btn-todo').attr('disabled', false).text('Kirim')
				}
			})
		})

		function getList() {
			$.ajax({
				url: "<?= site_url('todo/list') ?>",
				method: 'GET',

				beforeSend: ()=> {
					$('#div-todo').text('Sedang Memuat Todo List ....')
				},

				success: (data)=> {
					$('#div-todo').html(data)
				},

				error: ()=> {
					$('#div-todo').text('Ada Kesalahan, Harap Tunggu Beberapa saat.')

				}
			})
		}getList()

		function changeStatusTodo(id) {
			$.ajax({
				url: "<?= site_url('todo/change_status') ?>",
				method: 'POST',
				data: { id },

				success: (data)=> {
					if(data.status == 1) {
						$(`#status-todo-${id}`).addClass('bg-secondary')
					} else {
						$(`#status-todo-${id}`).removeClass('bg-secondary')
					}
				},

				error: ()=> {
					alert('Ada Kesalahan, saat mengganti status.')

				}
			})
		}

		function deleteTodo(id) {
			if(confirm("Hapus Todo List?")) {
				$.ajax({
					url: "<?= site_url('todo/delete') ?>",
					method: 'POST',
					data: { id },

					success: (data)=> {
						getList()
					},

					error: ()=> {
						alert('Ada Kesalahan, saat mengganti status.')

					}
				})
			}
		}
	</script>
</body>
</html>