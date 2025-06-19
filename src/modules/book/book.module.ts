import { Module } from '@nestjs/common';
import { BookingResolver } from './book.resolver';

@Module({
  imports: [],
  controllers: [],
  providers: [BookingResolver],
})
export class BookModule {}
