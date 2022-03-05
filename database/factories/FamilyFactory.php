<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Family>
 */
class FamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id'=>Student::factory(),
            'a_kk'=> $this->faker->name(),
            'a_nik'=> $this->faker->name(),
            'a_nama'=> $this->faker->name(),
            'a_pekerjaan'=> $this->faker->name(),
            'a_pendidikan'=> $this->faker->name(),
            'a_phone'=> $this->faker->name(),
            'a_penghasilan'=> $this->faker->name(),
            'i_nik'=> $this->faker->name(),
            'i_nama'=> $this->faker->name(),
            'i_pekerjaan'=> $this->faker->name(),
            'i_pendidikan'=> $this->faker->name(),
            'i_phone'=> $this->faker->name(),
            'w_hubungan_wali'=> $this->faker->name(),
            'w_nik'=> $this->faker->name(),
            'w_nama'=> $this->faker->name(),
            'w_pekerjaan'=> $this->faker->name(),
            'w_peghasilan'=> $this->faker->name(),
        ];
    }
}
