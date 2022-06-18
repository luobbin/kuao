<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CasesCateCreateRequest;
use App\Http\Requests\CasesCateUpdateRequest;
use App\Repositories\CasesCateRepository;
use App\Validators\CasesCateValidator;

/**
 * Class CasesCatesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CasesCatesController extends Controller
{
    /**
     * @var CasesCateRepository
     */
    protected $repository;

    /**
     * @var CasesCateValidator
     */
    protected $validator;

    /**
     * CasesCatesController constructor.
     *
     * @param CasesCateRepository $repository
     * @param CasesCateValidator $validator
     */
    public function __construct(CasesCateRepository $repository, CasesCateValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $casesCates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $casesCates,
            ]);
        }

        return view('casesCates.index', compact('casesCates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CasesCateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CasesCateCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $casesCate = $this->repository->create($request->all());

            $response = [
                'message' => 'CasesCate created.',
                'data'    => $casesCate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $casesCate = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $casesCate,
            ]);
        }

        return view('casesCates.show', compact('casesCate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $casesCate = $this->repository->find($id);

        return view('casesCates.edit', compact('casesCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CasesCateUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CasesCateUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $casesCate = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CasesCate updated.',
                'data'    => $casesCate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'CasesCate deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CasesCate deleted.');
    }
}
