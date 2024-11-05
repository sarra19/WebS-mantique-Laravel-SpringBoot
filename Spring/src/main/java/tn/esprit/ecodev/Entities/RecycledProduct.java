package tn.esprit.ecodev.Entities;
import jakarta.persistence.*;
import lombok.*;
import org.hibernate.annotations.CreationTimestamp;
import org.hibernate.annotations.UpdateTimestamp;

import java.math.BigDecimal;
import java.util.Date;

@Entity
@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
@ToString
@Table(name = "recycled_products")
public class RecycledProduct {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String name;

    private String image;

    @Column(length = 1000)
    private String description;

    private int quantity;

    private BigDecimal price;

    @ManyToOne
    @JoinColumn(name = "category_id")
    private Category category;

    // Many products can have the same recycled content
    @ManyToOne
    @JoinColumn(name = "recycled_content_id")
    private RecycledContent recycledContent;
    @Column(name = "sales_center_id")
    private long salesCenter = 1;
   /*@ManyToOne
    @JoinColumn(name = "sales_center_id")
    private SalesCenter salesCenter;*/
   @CreationTimestamp
   @Column(updatable = false, name = "created_at")
   private Date createdAt;

    @UpdateTimestamp
    @Column(name = "updated_at")
    private Date updatedAt;


    // Constructors


}
