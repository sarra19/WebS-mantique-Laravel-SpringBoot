package tn.esprit.ecodev.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import tn.esprit.ecodev.Entities.RecycledProduct;
@Repository

public interface RecycledProductRepository extends JpaRepository<RecycledProduct, Long> {
}
