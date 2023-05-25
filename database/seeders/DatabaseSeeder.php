<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminRolesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(AdminWalletHistoriesTableSeeder::class);
        $this->call(AdminWalletsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(BusinessSettingsTableSeeder::class);
        $this->call(CartShippingsTableSeeder::class);
        $this->call(CartsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ChattingsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(CustomerWalletHistoriesTableSeeder::class);
        $this->call(CustomerWalletsTableSeeder::class);
        $this->call(DealOfTheDaysTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(FeatureDealsTableSeeder::class);
        $this->call(FlashDealProductsTableSeeder::class);
        $this->call(FlashDealsTableSeeder::class);
        $this->call(HelpTopicsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(OauthAccessTokensTableSeeder::class);
        $this->call(OauthAuthCodesTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
        $this->call(OauthPersonalAccessClientsTableSeeder::class);
        $this->call(OauthRefreshTokensTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(OrderTransactionsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PhoneOrEmailVerificationsTableSeeder::class);
        $this->call(ProductStocksTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(SearchFunctionsTableSeeder::class);
        $this->call(SellerWalletHistoriesTableSeeder::class);
        $this->call(SellerWalletsTableSeeder::class);
        $this->call(SellersTableSeeder::class);
        $this->call(ShippingAddressesTableSeeder::class);
        $this->call(ShippingMethodsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(SocialMediasTableSeeder::class);
        $this->call(SoftCredentialsTableSeeder::class);
        $this->call(SupportTicketConvsTableSeeder::class);
        $this->call(SupportTicketsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WishlistsTableSeeder::class);
        $this->call(WithdrawRequestsTableSeeder::class);
    }
}
