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


php artisan make:migration create_reviews_table
php artisan make:controller ReviewController --resource
php artisan make:model PasswordReset
php artisan make:request StoreReviewRequest
php artisan make:resource ReviewResource


php artisan make:migration create_booked_seats_table
php artisan make:controller BookedSeatController --resource
php artisan make:model BookedSeat
php artisan make:request StoreBookedSeatRequest
php artisan make:resource BookedSeatResource

php artisan make:migration create_operator_docs_table
php artisan make:controller OperatorDocController --resource
php artisan make:model OperatorDoc
php artisan make:request StoreOperatorDocRequest
php artisan make:resource OperatorDocResource



php artisan make:controller BusAmenityController --resource
php artisan make:model BusAmenity
php artisan make:request StoreBusAmenityRequest
php artisan make:resource BusAmenityResource
