<div class="search-div" id="search-id">
        <div class="burgerIcon" onclick="burgerKategoria()">
            <img src="Images/Icons/burgerMenu.png" alt="">
        </div>
        <div class="relativeSearch">
            <form method = "get">
            <input class="search" type="search" name = "search" placeholder="Çfarë po kërkoni?">
            <button name = "submit">
                <img src="Images/Icons/searchIcon.png" id="searchIcon" alt="">
            </button>
            </form>
        </div>
        <div class="icon">
            <img src="Images/Icons/wishList.png"  alt="">
            <img src="Images/Icons/cart1.png"  alt="">
        </div>
</div>
<?php 
if(isset($_GET['submit'])){
    $location = "Location: searchResult.php?search=".$_GET['search'];
    header($location);
}
?>