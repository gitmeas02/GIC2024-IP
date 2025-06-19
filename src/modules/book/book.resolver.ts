import { Args, Mutation, Query, Resolver } from '@nestjs/graphql';

@Resolver('Booking')
export class BookingResolver {
  private bookings = [
    // Example booking
    {
      id: 1,
      start_date: new Date(),
      end_date: new Date(),
      hotel_id: 1,
      is_checked_in: false,
      price: 100
    }
  ];

  @Query('bookings')
  getAllBookings() {
    return this.bookings;
  }

  @Query('bookingsByDateRange')
  getBookingsByDateRange(
    @Args('start_date') startDate: Date,
    @Args('end_date') endDate: Date
  ) {
    return this.bookings.filter(
      b =>
        new Date(b.start_date) >= new Date(startDate) &&
        new Date(b.end_date) <= new Date(endDate)
    );
  }

  @Mutation('bookHotel')
  bookHotel(
    @Args('start_date') start_date: Date,
    @Args('end_date') end_date: Date,
    @Args('hotel_id') hotel_id: number,
    @Args('price') price: number
  ) {
    const id = this.bookings.length > 0 ? this.bookings[this.bookings.length - 1].id + 1 : 1;
    const booking = {
      id,
      start_date,
      end_date,
      hotel_id,
      is_checked_in: false,
      price
    };
    this.bookings.push(booking);
    return booking;
  }

  @Mutation('cancelBooking')
  cancelBooking(@Args('id') id: number) {
    const index = this.bookings.findIndex(b => b.id === id);
    if (index === -1) return false;
    this.bookings.splice(index, 1);
    return true;
  }

  @Mutation('checkIn')
  checkIn(@Args('id') id: number) {
    const booking = this.bookings.find(b => b.id === id);
    if (!booking) return null;
    booking.is_checked_in = true;
    return booking;
  }
}
