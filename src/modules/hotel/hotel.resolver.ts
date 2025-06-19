import { Args, Mutation, Query, Resolver } from '@nestjs/graphql';

@Resolver('Hotel')
export class HotelResolver {
  private hotels = [
    { id: 1, name: 'Khhun Hotel', author: 'Dara', price: 10 },
    { id: 2, name: 'M-Lio Hotel', author: 'Sok', price: 20 },
    { id: 3, name: 'Me Hotel', author: 'Ratha', price: 15 },
  ];

  @Query('hotels')
  getAllHotels() {
    return this.hotels;
  }

  @Query('hotel')
  getHotelById(@Args('id') id: number) {
    return this.hotels.find(h => h.id === id);
  }

@Mutation('addHotel')
addHotel(
  @Args('name') name: string,
  @Args('price') price: number,
  @Args('author') author: string
) {
  const lastId = this.hotels.length > 0 ? this.hotels[this.hotels.length - 1].id : 0;
  const newHotel = { id: lastId + 1, name, author: author, price };
  this.hotels.push(newHotel);
  return newHotel;
}
  @Mutation('updateHotel')
  updateHotel(@Args('id') id: number, @Args('name') name: string, @Args('price') price: number) {
    const hotelIndex = this.hotels.findIndex(h => h.id === id);
    if (hotelIndex === -1) return null;
    if (name) this.hotels[hotelIndex].name = name;
    if (price) this.hotels[hotelIndex].price = price;
    return this.hotels[hotelIndex];
  }

  @Mutation('deleteHotel')
  deleteHotel(@Args('id') id: number) {
    const index = this.hotels.findIndex(h => h.id === id);
    if (index === -1) return false;
    this.hotels.splice(index, 1);
    return true;
  }
}
