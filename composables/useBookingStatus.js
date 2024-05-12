export const useBookingStatus = (status) => {
    switch (status) {
        case 'CANCELLED_BY_CUSTOMER':
            return 'Cancelled by passenger';
        case 'CANCELLED_BY_OPERATOR':
            return 'Cancelled by operator';
        case 'PENDING':
            return 'Pending';
        case 'DECLINED':
            return 'Declined';
        case 'BOOKED':
            return 'Booked';
        default:
            return 'Unknown status';
    }
}