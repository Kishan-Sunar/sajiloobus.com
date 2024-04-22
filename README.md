### SHORT
php artisan make:migration create_schedules_table
php artisan make:controller ScheduleController --resource
php artisan make:model Schedule
php artisan make:request StoreScheduleRequest
php artisan make:resource ScheduleResource


php artisan make:migration create_route_points_table
php artisan make:controller RoutePointController --resource
php artisan make:model RoutePoint
php artisan make:request StoreRoutePointRequest
php artisan make:resource RoutePointResource

php artisan make:migration create_bookings_table
php artisan make:controller BookingController --resource
php artisan make:model Booking
php artisan make:request StoreBookingRequest
php artisan make:resource BookingResource

php artisan make:migration create_password_resets_table
php artisan make:controller PasswordResetController --resource
php artisan make:model PasswordReset
php artisan make:request StorePasswordResetRequest
php artisan make:resource PasswordResetResource
