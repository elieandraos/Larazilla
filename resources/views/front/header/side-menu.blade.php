<!-- body has the class "cbp-spmenu-push" -->
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<h3>Menu</h3>
	<a href="#">Celery seakale</a>
	<a href="#">Dulse daikon</a>
	<a href="#">Zucchini garlic</a>
	<a href="#">Catsear azuki bean</a>
	<a href="#">Dandelion bunya</a>
	<a href="#">Rutabaga</a>
</nav>


<style>
/* General styles for all menus */
.cbp-spmenu {
	background: #47a3da;
	position: fixed;
}

.cbp-spmenu h3 {
	color: #afdefa;
	font-size: 1.9em;
	padding: 20px;
	margin: 0;
	font-weight: 300;
	background: #0d77b6;
}

.cbp-spmenu a {
	display: block;
	color: #fff;
	font-size: 1.1em;
	font-weight: 300;
}

.cbp-spmenu a:hover {
	background: #258ecd;
}

.cbp-spmenu a:active {
	background: #afdefa;
	color: #47a3da;
}

/* Orientation-dependent styles for the content of the menu */

.cbp-spmenu-vertical {
	width: 240px;
	height: 100%;
	top: 0;
	z-index: 1000;
}

.cbp-spmenu-vertical a {
	border-bottom: 1px solid #258ecd;
	padding: 1em;
}

.cbp-spmenu-horizontal {
	width: 100%;
	height: 150px;
	left: 0;
	z-index: 1000;
	overflow: hidden;
}

.cbp-spmenu-horizontal h3 {
	height: 100%;
	width: 20%;
	float: left;
}

.cbp-spmenu-horizontal a {
	float: left;
	width: 20%;
	padding: 0.8em;
	border-left: 1px solid #258ecd;
}

/* Vertical menu that slides from the left or right */

.cbp-spmenu-left {
	left: -240px;
}

.cbp-spmenu-right {
	right: -240px;
}

.cbp-spmenu-left.cbp-spmenu-open {
	left: 0px;
}

.cbp-spmenu-right.cbp-spmenu-open {
	right: 0px;
}

/* Horizontal menu that slides from the top or bottom */

.cbp-spmenu-top {
	top: -150px;
}

.cbp-spmenu-bottom {
	bottom: -150px;
}

.cbp-spmenu-top.cbp-spmenu-open {
	top: 0px;
}

.cbp-spmenu-bottom.cbp-spmenu-open {
	bottom: 0px;
}

/* Push classes applied to the body */

.cbp-spmenu-push {
	overflow-x: hidden;
	position: relative;
	left: 0;
}

.cbp-spmenu-push-toright {
	left: 240px;
}

.cbp-spmenu-push-toleft {
	left: -240px;
}

/* Transitions */

.cbp-spmenu,
.cbp-spmenu-push {
	-webkit-transition: all 0.3s ease;
	-moz-transition: all 0.3s ease;
	transition: all 0.3s ease;
}

/* Example media queries */

@media screen and (max-width: 55.1875em){

	.cbp-spmenu-horizontal {
		font-size: 75%;
		height: 110px;
	}

	.cbp-spmenu-top {
		top: -110px;
	}

	.cbp-spmenu-bottom {
		bottom: -110px;
	}

}

@media screen and (max-height: 26.375em){

	.cbp-spmenu-vertical {
		font-size: 90%;
		width: 190px;
	}

	.cbp-spmenu-left,
	.cbp-spmenu-push-toleft {
		left: -190px;
	}

	.cbp-spmenu-right {
		right: -190px;
	}

	.cbp-spmenu-push-toright {
		left: 190px;
	}
}

</style>