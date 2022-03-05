<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'user_id'=>User::factory(),
            'kip'=>$this->faker->word(),
            'pkh'=>$this->faker->word(),
            'kks'=>$this->faker->word(),
            'nik'=>$this->faker->word(),
            'tanggal_lahir'=>$this->faker->word(),
            'jenis_kelamin'=>$this->faker->randomElement(['laki-laki','perempuan']),
            'agama'=>$this->faker->randomElement(['islam','protestan','katolik','hindu','budha','khonghucu']),
            'hobi'=>$this->faker->randomElement(['olahraga','kesenian','membaca','menulis','jalan-jalan','lainnya']),
            'cita_cita'=>$this->faker->randomElement(['lainnya','PNS','TNI/Polri','Guru/Dosen','Dokter','Politikus','Wiraswasta','Seniman/Artis','Ilmuwan','Agamawan']),
            'kewarganegaraan'=>$this->faker->word(),
            'kebutuhan_khusus'=>$this->faker->word(),
            'status_rumah'=>$this->faker->word(),
            'status_mukim'=>$this->faker->word(),
            
            // alamat rumah
            'alamat' => $this->faker->name(),
            'rtrw' => $this->faker->name(),
            'provinsi' => $this->faker->name(),
            'kota' => $this->faker->name(),
            'kecamatan' => $this->faker->name(),
            'kode_pos' => $this->faker->name(),
            
        ];
    }
}
