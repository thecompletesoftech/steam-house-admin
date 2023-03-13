<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Question
     */
    public static function create(array $data)
    {
        $data = Question::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Question $question
     * @return Question
     */
    public static function update(array $data, Question $question)
    {
        $data = $question->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return Question
     */
    public static function updateById(array $data, $id)
    {
        $data = Question::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Question
     */
    public static function getById($id)
    {
        $data = Question::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Question
     * @return bool
     */
    public static function delete(Question $question)
    {
        $data = $question->delete();
        return $data;
    }

    /**
     * RemoveById the specified resource from storage.
     *
     * @param  $id
     * @return bool
     */
    public static function deleteById($id)
    {
        $data = Question::whereId($id)->delete();
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - Question Id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = Question::where('id', $id)->update($data);
        return $data;
    }

    

    /**
     * Get data for datatable from storage.
     *
     * @return Question with states, countries
     */
    public static function datatable()
    {
        $data = Question::orderBy('created_at', 'desc');
        return $data;
    }
}
