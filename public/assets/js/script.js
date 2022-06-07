/* eslint-disable no-undef */
const dataConfirm = document.querySelectorAll("[data-confirm]")
dataConfirm.forEach((element) => {
	element.addEventListener("click", (e) => {
		const href = e.target.getAttribute("href")
		const nameStudent = e.target.dataset.confirm
		console.log(nameStudent)
		Swal.fire({
			title: "Apa anda yakin?",
			text: "hapus data mahasiswa atas nama: " + nameStudent,
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) document.location.href = href
		})
		e.preventDefault()
	})
})
