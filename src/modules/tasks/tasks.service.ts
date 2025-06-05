import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { User } from 'src/modules/users/entities/user.entity';
import { Repository } from 'typeorm';
import { Task } from './entities/task.entity';

@Injectable()
export class TasksService {
  constructor(
    @InjectRepository(Task)
    private taskRepo: Repository<Task>,
    @InjectRepository(User)
    private userRepo: Repository<User>,
  ) {}

  async create(taskData: Partial<Task>) {
    const user = await this.userRepo.findOneBy({ id: taskData.user as any });
    if (!user) throw new NotFoundException('User not found');
    const task = this.taskRepo.create({ ...taskData, user });
    return this.taskRepo.save(task);
  }

  findAll() {
    return this.taskRepo.find({ relations: ['user'] });
  }

  async findOne(id: number) {
    const task = await this.taskRepo.findOne({
      where: { id },
      relations: ['user'],
    });

    if (!task) {
      throw new NotFoundException(`Task with id ${id} not found`);
    }

    return task;
  }

  async update(id: number, updateData: Partial<Task>) {
    await this.taskRepo.update(id, updateData);
    return this.findOne(id);
  }

  async remove(id: number) {
    const task = await this.findOne(id);
    if (!task) throw new NotFoundException('Task not found');
    await this.taskRepo.delete(id);
    return { message: `Task ${id} deleted` };
  }
}
