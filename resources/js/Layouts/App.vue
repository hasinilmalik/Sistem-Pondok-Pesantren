<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
            <div class="container">
                <Link class="navbar-brand" href="/madin-home">MADIN</Link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <Link class="nav-link text-uppercase" href="/madin-data/belum"
                                >Data</Link
                            >
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link text-uppercase" href="/madin-mapel/"
                                >MAPEL</Link
                            >
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link text-uppercase" href="/madin-kelas/"
                                >KELAS</Link
                            >
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link text-uppercase" href="/madin-rombel/"
                                >ROMBEL</Link
                            >
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link text-uppercase" href="/madin-nilai/"
                                >NILAI</Link
                            >
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button class="btn btn-light" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="container mt-5">
            <slot />
        </main>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init();
export default {
    components: {
        Link,
    },
};
</script>

<style scoped>
.mt-5 {
    margin-top: 100px !important;
}
</style>
