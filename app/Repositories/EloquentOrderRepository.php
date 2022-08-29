<?php

namespace App\Repositories;

use App\Contracts\Repositories\OrderRepository;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ELoquentOrderRepository extends EloquentRepository implements OrderRepository
{
    public function __construct(Order $model)
    {
        return parent::__construct($model);
    }

    public function getAllOrders()
    {
        return $this->model->with('user')
            ->orderBy('id', 'desc')
            ->paginate(config('const.pagination'));
    }

    public function getOrderUserApprove()
    {
        $user = Auth::user();

        return $this->model->with('orderDetails')
            ->where('user_id', $user->id)
            ->where('status', config('const.completed'))
            ->paginate(config('const.pagination'));
    }

    public function getStatusOrder()
    {
        $user = Auth::user();

        return $this->model->with('orderDetails')
            ->where('user_id', $user->id)
            ->where('status', '<>', config('const.completed'))
            ->orWhere('status', '<>', config('const.reject'))
            ->get();
            // ->paginate(config('const.pagination'));
    }
}