<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttendanciesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attendancy\BulkDestroyAttendancy;
use App\Http\Requests\Admin\Attendancy\DestroyAttendancy;
use App\Http\Requests\Admin\Attendancy\IndexAttendancy;
use App\Http\Requests\Admin\Attendancy\StoreAttendancy;
use App\Http\Requests\Admin\Attendancy\UpdateAttendancy;
use App\Models\Attendancy;
use App\Models\Student;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\View\View;

class AttendanciesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAttendancy $request
     * @return array|Factory|View
     */
    public function index(IndexAttendancy $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Attendancy::class)
            ->processRequestAndGet(
                // pass the request with params
                $request,

                // set columns to query
                ['id', 'notified', 'student_id', "created_at"],

                // set columns to searchIn
                ['id'],

                function ($query) use ($request) {
                    $query->with(['student']);
                    if ($request->has('students')) {
                        $query->whereIn('student_id', $request->get('students'));
                    }
                }
            );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.attendancy.index', ['data' => $data, "students" => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.attendancy.create');

        return view('admin.attendancy.create', ["students" => Student::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAttendancy $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAttendancy $request)
    {

        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['student_id'] = $request->getStudentId();
        // Store the Attendancy
        $attendancy = Attendancy::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/attendancies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/attendancies');
    }

    /**
     * Display the specified resource.
     *
     * @param Attendancy $attendancy
     * @throws AuthorizationException
     * @return void
     */
    public function show(Attendancy $attendancy)
    {
        $this->authorize('admin.attendancy.show', $attendancy);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Attendancy $attendancy
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Attendancy $attendancy)
    {
        $this->authorize('admin.attendancy.edit', $attendancy);


        return view('admin.attendancy.edit', [
            'attendancy' => $attendancy,
            "students" => Student::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAttendancy $request
     * @param Attendancy $attendancy
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAttendancy $request, Attendancy $attendancy)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['student_id'] = $request->getStudentId();
        // Update changed values Attendancy
        $attendancy->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/attendancies'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/attendancies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAttendancy $request
     * @param Attendancy $attendancy
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAttendancy $request, Attendancy $attendancy)
    {
        $attendancy->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAttendancy $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAttendancy $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Attendancy::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Export entities
     *
     * @return BinaryFileResponse|null
     */
    public function export(): ?BinaryFileResponse
    {
        return Excel::download(app(AttendanciesExport::class), 'attendancies.xlsx');
    }
}
