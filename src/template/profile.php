<header class="mt-3 container">
    <h1>Il profilo di <strong><?php echo $user->getName(); ?></strong></h1>
</header>
<section>
    <header>
        <h2>Le tue informazioni</h2>
    </header>
    <?php switch (getUserLevel()) {
        case UserLevel::Customer:
            include('profiles/customer_info.php');
            break;
        case UserLevel::CanteenAdmin:
            $canteen = $templateParams["canteen"];
        }
        ?>
</section>
