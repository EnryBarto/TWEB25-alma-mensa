<header class="mt-3 container">
    <h1>Il profilo di <strong><?php echo $user->getName(); ?></strong></h1>
</header>
<section class="mt-4 container">
    <header>
        <h2>Le tue informazioni</h2>
    </header>
    <?php switch (getUserLevel()) {
        case UserLevel::Customer:
            include('components/customer_info.php');
            break;
        case UserLevel::CanteenAdmin:
            include('components/canteen_info.php');
            break;
        }
        ?>
</section>
