<?php

include('./DB_conn.php');
$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$result = $conn->query("SELECT * FROM users LIMIT $start, $limit");
$customers = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query("SELECT count(id) AS id FROM users");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;

?>
<!DOCTYPE html>
<html>

<head>
	<title>Learn Web Coding > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css" />
	<script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
</head>

<body>
	<div class="container well">
		<h1 class="text-center">Bootstrap Pagination in PHP and MySQL</h1>
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li>
							<a href="index.php?page=<?= $Previous; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo; Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $pages; $i++) : ?>
							<li><a href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
						<?php endfor; ?>
						<li>
							<a href="index.php?page=<?= $Next; ?>" aria-label="Next">
								<span aria-hidden="true">Next &raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="text-center" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="#">
					<select name="limit-records" id="limit-records">
						<option disabled="disabled" selected="selected">---Limit Records---</option>
						<?php foreach ([10, 20, 30, 40, 50] as $limit) : ?>
							<option <?php if (isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
						<?php endforeach; ?>
					</select>
				</form>
			</div>
		</div>
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Address</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($customers as $customer) :  ?>
						<tr>
							<td><?= $customer['id']; ?></td>
							<td><?= $customer['Fname']; ?></td>
							<td><?= $customer['Lname']; ?></td>
							<td><?= $customer['Email']; ?></td>
							<td><?= $customer['Phone']; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>


		</div>

		<div style="position: fixed; bottom: 10px; right: 10px; color: green;">
			<strong>
				Learn Web Coding
			</strong>
		</div>

		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#limit-records").change(function() {
					$('form').submit();
				})
			})
		</script>
</body>

</html>