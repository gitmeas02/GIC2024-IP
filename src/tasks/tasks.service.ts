import { Injectable, NotFoundException } from '@nestjs/common';
import { CreateTaskDto } from './dto/create-task.dto';
import { UpdateTaskDto } from './dto/update-task.dto';
import { InjectRepository } from '@nestjs/typeorm';
import { Task } from './entities/task.entity';
import { Repository } from 'typeorm';
import { User } from 'src/users/entities/user.entity';

@Injectable()
export class TasksService {
 constructor(
  @InjectRepository(Task)
  private taskRepo:Repository<Task>,

  @InjectRepository(User)
  private userRepo:Repository<User>
 ){}

  async create(CreateTaskDto: CreateTaskDto, userId:number) {
    const user = await this.userRepo.findOne({where:{id:userId}});
    if(!user) throw new NotFoundException('User not found');
    const task = this.taskRepo.create({
      ...CreateTaskDto,
      user,
    })
    return this.taskRepo.save(task);
  }

  findAll() {
    return this.taskRepo.find({relations:['user']});
  }

  async findOne(id: number) {
    const task = await this.taskRepo.findOne({where:{id},relations:['user']});
        if(!task) throw new NotFoundException('Task Not found');
    return task;
  }

  async update(id: number, updateTaskDto: UpdateTaskDto) {
    const task = await this.findOne(id);
    Object.assign(task,updateTaskDto);
    return this.taskRepo.save(task);
  }

  async remove(id: number) {
    const task = await this.findOne(id);
    return this.taskRepo.remove(task);
  }
}
