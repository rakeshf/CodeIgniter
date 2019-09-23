<body>
	<header>
		<div class="navbar navbar-dark bg-dark shadow-sm">
			<div class="container d-flex justify-content-between">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<strong>Chorbazaar</strong>
				</a>
			</div>
		</div>
	</header>
<main role="main">
<?php
if (isset($page)) {
  if (isset($module)) {
    $this->load->view("$module/$page");
  } else {
    $this->load->view($page);
  }
}?>
</main>