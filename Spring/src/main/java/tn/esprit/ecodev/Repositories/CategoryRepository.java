package tn.esprit.ecodev.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import tn.esprit.ecodev.Entities.Category;
@Repository

public interface CategoryRepository  extends JpaRepository<Category, Long> {
}
