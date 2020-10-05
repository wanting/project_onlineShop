<div class="b-hight"></div>
<h1 class="b-h1 font1 green"><a href="<?= WEB_ROOT ?>/onlineshop-index.php">Online Shop</a></h1>
<div class="container b-main-nav">
    <ul class="d-flex justify-content-center  ">
        <li class="b-btn-n "><a class="b-sale" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a></li>
        <li class="b-btn-n  "><a class="text-nowrap " href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
        <li class="b-btn-n   "><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
    </ul>
</div>

<nav class="b-phone-nav-n">
    <ul class="b-menu-n">
        <li id="b-drop-down">
            <ul class="d-flex justify-content-center  b-list-n bb-button" href="">

                <a class="b-all-n label-text">All </a> <i class="b-down-arrow-n "></i>
            </ul>

            <ul class="b-submenu1-n options">
                <li class="option"><a class="" href="#">All</a>
                <li class="option"><a class="b-sale" href="<?= WEB_ROOT ?>/onlineshop-sale.php">Sale</a>
                </li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-newarrivals.php">New Arrivals</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=3">Bags</a></li>
                <li class="option"><a href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=4">Clothes</a></li>
                <li class="option"><a class="" href="<?= WEB_ROOT ?>/onlineshop-bcl.php?cate=5">Living</a></li>
            </ul>
        </li>


    </ul>
</nav>
<script>
    let button = document.querySelector(".bb-button");
    let label = document.querySelector(".label-text");
    let options = document.querySelector(".options");

    const NODES = ["BUTTON", "LABEL", "I"];

    window.addEventListener("click", (e) => {
        if (NODES.includes(e.target.nodeName)) return;
        button.classList.remove("active");
    });

    button.addEventListener("click", (e) => {
        button.classList.toggle("active");
    });

    options.addEventListener("click", (e) => {
        label.innerText = e.target.innerText;
        button.classList.add("selected");
        button.classList.remove("active");
    });
</script>