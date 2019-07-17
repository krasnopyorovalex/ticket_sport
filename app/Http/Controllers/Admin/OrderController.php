<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Order\Commands\DeleteOrderCommand;
use App\Domain\Order\Commands\UpdateOrderCommand;
use App\Domain\Order\Queries\GetAllOrdersQuery;
use App\Domain\Order\Queries\GetOrderByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Order\Requests\UpdateOrderRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class OrderController
 * @package App\Http\Controllers\Admin
 */
class OrderController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $orders = $this->dispatch(new GetAllOrdersQuery());

        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $order = $this->dispatch(new GetOrderByIdQuery($id));

        return view('admin.orders.edit', [
            'Order' => $order
        ]);
    }

    /**
     * @param $id
     * @param UpdateOrderRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $this->dispatch(new UpdateOrderCommand($id, $request));

        return redirect(route('admin.orders.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteOrderCommand($id));

        return redirect(route('admin.orders.index'));
    }
}
