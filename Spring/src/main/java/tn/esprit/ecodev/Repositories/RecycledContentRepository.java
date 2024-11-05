package tn.esprit.ecodev.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import tn.esprit.ecodev.Entities.RecycledContent;
@Repository

public interface RecycledContentRepository  extends JpaRepository<RecycledContent, Long> {
}
