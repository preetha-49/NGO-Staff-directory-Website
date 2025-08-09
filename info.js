const staffForm = document.getElementById("staffForm");
const staffList = document.getElementById("staffList");

staffForm.addEventListener("submit", function (e) {
e.preventDefault();

const name = document.getElementById("name").value.trim();
const email = document.getElementById("email").value.trim();
const phone = document.getElementById("phone").value.trim();
const department = document.getElementById("Job role").value.trim();


if (name && email && phone && Job role && photo) {
  const li = document.createElement("li");
  li.innerHTML =
    <span><strong>Name:</strong> ${name}</span>
    <span><strong>Email:</strong> ${email}</span>
    <span><strong>Phone:</strong> ${phone}</span>
    <span><strong>Job role:</strong> ${Job role}</span>
    <span><strong>Upload Photo:</strong>${photo}</span>
    <button class="delete-btn">Delete</button>

  li.querySelector(".delete-btn").addEventListener("click", () => {
    li.remove();
  });

  staffList.appendChild(li);

  // Clear form
  staffForm.reset();
}
});